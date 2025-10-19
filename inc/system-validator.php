<?php

/**
 * Luxury Boot Catalog - System Validation Script
 * Tests all Phase 3B implementations including sample products, filtering, accessibility, and performance
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

class LSX_System_Validator
{

	private $test_results = [];
	private $passed_tests = 0;
	private $total_tests = 0;

	public function __construct()
	{
		add_action('init', array($this, 'run_validation_tests'), 9999); // Run after all registrations
		add_action('wp_footer', array($this, 'display_test_results'));
	}

	/**
	 * Run comprehensive system validation
	 */
	public function run_validation_tests()
	{
		// Only run tests for administrators and in development
		if (!current_user_can('administrator') || !WP_DEBUG) {
			return;
		}

		$this->test_custom_post_type();
		$this->test_taxonomies();
		$this->test_sample_products();
		$this->test_filter_system();
		$this->test_theme_assets();
		$this->test_accessibility_features();
		$this->test_performance_optimizations();
	}

	/**
	 * Test Custom Post Type Registration
	 */
	private function test_custom_post_type()
	{
		$this->total_tests++;
		$post_type = get_post_type_object('product');

		if ($post_type && $post_type->public) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Custom Post Type Registration',
				'status' => 'PASS',
				'message' => 'Product post type registered successfully'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Custom Post Type Registration',
				'status' => 'FAIL',
				'message' => 'Product post type not found or not public'
			];
		}
	}

	/**
	 * Test Taxonomy Registration
	 */
	private function test_taxonomies()
	{
		$required_taxonomies = [
			'heel_height',
			'material',
			'finish',
			'collection',
			'brand',
			'country',
			'color',
			'silhouette',
			'closure'
		];

		foreach ($required_taxonomies as $taxonomy) {
			$this->total_tests++;

			if (taxonomy_exists($taxonomy)) {
				$this->passed_tests++;
				$this->test_results[] = [
					'test' => "Taxonomy: {$taxonomy}",
					'status' => 'PASS',
					'message' => "Taxonomy {$taxonomy} registered successfully"
				];
			} else {
				$this->test_results[] = [
					'test' => "Taxonomy: {$taxonomy}",
					'status' => 'FAIL',
					'message' => "Taxonomy {$taxonomy} not found"
				];
			}
		}
	}

	/**
	 * Test Sample Products Creation
	 */
	private function test_sample_products()
	{
		$this->total_tests++;

		$sample_products = get_posts([
			'post_type' => 'product',
			'posts_per_page' => -1,
			'meta_query' => [
				[
					'key' => '_lsx_sample_product',
					'value' => '1',
					'compare' => '='
				]
			]
		]);

		$expected_brands = ['GUCCI', 'Louis Vuitton', 'Prada', 'Saint Laurent', 'Christian Louboutin', 'Balenciaga'];
		$found_brands = [];

		foreach ($sample_products as $product) {
			$brand_terms = get_the_terms($product->ID, 'brand');
			if ($brand_terms && !is_wp_error($brand_terms)) {
				foreach ($brand_terms as $term) {
					$found_brands[] = $term->name;
				}
			}
		}

		$missing_brands = array_diff($expected_brands, $found_brands);

		if (empty($missing_brands) && count($sample_products) >= 6) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Sample Products Creation',
				'status' => 'PASS',
				'message' => 'All 6 luxury brand sample products created successfully'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Sample Products Creation',
				'status' => 'FAIL',
				'message' => 'Missing sample products. Found: ' . count($sample_products) . ', Missing brands: ' . implode(', ', $missing_brands)
			];
		}
	}

	/**
	 * Test Filter System Components
	 */
	private function test_filter_system()
	{
		// Test PHP filter handler
		$this->total_tests++;
		$filter_handler_path = get_template_directory() . '/inc/luxury-product-filter-handler.php';

		if (file_exists($filter_handler_path)) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Filter Handler File',
				'status' => 'PASS',
				'message' => 'Product filter handler file exists'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Filter Handler File',
				'status' => 'FAIL',
				'message' => 'Product filter handler file not found'
			];
		}

		// Test filter pattern
		$this->total_tests++;
		$filter_pattern_path = get_template_directory() . '/patterns/product-filter-bar.php';

		if (file_exists($filter_pattern_path)) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Filter Pattern File',
				'status' => 'PASS',
				'message' => 'Product filter pattern file exists'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Filter Pattern File',
				'status' => 'FAIL',
				'message' => 'Product filter pattern file not found'
			];
		}

		// Test JavaScript filter
		$this->total_tests++;
		$filter_js_path = get_template_directory() . '/assets/js/luxury-product-filter.js';

		if (file_exists($filter_js_path)) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Filter JavaScript File',
				'status' => 'PASS',
				'message' => 'Product filter JavaScript file exists'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Filter JavaScript File',
				'status' => 'FAIL',
				'message' => 'Product filter JavaScript file not found'
			];
		}
	}

	/**
	 * Test Theme Assets
	 */
	private function test_theme_assets()
	{
		$required_assets = [
			'Cross-Device CSS' => '/assets/css/cross-device-testing.css',
			'Performance CSS' => '/assets/css/performance-optimization.css',
			'Filter CSS' => '/assets/css/luxury-product-filter.css'
		];

		foreach ($required_assets as $name => $path) {
			$this->total_tests++;
			$full_path = get_template_directory() . $path;

			if (file_exists($full_path)) {
				$this->passed_tests++;
				$this->test_results[] = [
					'test' => $name,
					'status' => 'PASS',
					'message' => "{$name} file exists and accessible"
				];
			} else {
				$this->test_results[] = [
					'test' => $name,
					'status' => 'FAIL',
					'message' => "{$name} file not found at {$path}"
				];
			}
		}
	}

	/**
	 * Test Accessibility Features
	 */
	private function test_accessibility_features()
	{
		$this->total_tests++;
		$accessibility_pattern_path = get_template_directory() . '/patterns/accessibility-test-component.php';

		if (file_exists($accessibility_pattern_path)) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Accessibility Testing Component',
				'status' => 'PASS',
				'message' => 'Accessibility testing pattern exists'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Accessibility Testing Component',
				'status' => 'FAIL',
				'message' => 'Accessibility testing pattern not found'
			];
		}

		// Test theme.json accessibility features
		$this->total_tests++;
		$theme_json_path = get_template_directory() . '/theme.json';

		if (file_exists($theme_json_path)) {
			$theme_json = json_decode(file_get_contents($theme_json_path), true);

			if (
				isset($theme_json['settings']['color']['palette']) &&
				isset($theme_json['settings']['typography']['fontFamilies'])
			) {
				$this->passed_tests++;
				$this->test_results[] = [
					'test' => 'Theme.json Accessibility Setup',
					'status' => 'PASS',
					'message' => 'Theme.json contains proper color and typography settings'
				];
			} else {
				$this->test_results[] = [
					'test' => 'Theme.json Accessibility Setup',
					'status' => 'FAIL',
					'message' => 'Theme.json missing required accessibility settings'
				];
			}
		} else {
			$this->test_results[] = [
				'test' => 'Theme.json Accessibility Setup',
				'status' => 'FAIL',
				'message' => 'Theme.json file not found'
			];
		}
	}

	/**
	 * Test Performance Optimizations
	 */
	private function test_performance_optimizations()
	{
		// Test structured data function
		$this->total_tests++;

		if (function_exists('lsx_get_product_structured_data')) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Structured Data Function',
				'status' => 'PASS',
				'message' => 'Product structured data function available'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Structured Data Function',
				'status' => 'FAIL',
				'message' => 'Product structured data function not found'
			];
		}

		// Test image size registration
		$this->total_tests++;
		$image_sizes = wp_get_additional_image_sizes();

		if (isset($image_sizes['product-thumbnail']) && isset($image_sizes['product-large'])) {
			$this->passed_tests++;
			$this->test_results[] = [
				'test' => 'Product Image Sizes',
				'status' => 'PASS',
				'message' => 'Product image sizes registered successfully'
			];
		} else {
			$this->test_results[] = [
				'test' => 'Product Image Sizes',
				'status' => 'FAIL',
				'message' => 'Product image sizes not registered properly'
			];
		}
	}

	/**
	 * Display test results in footer for administrators
	 */
	public function display_test_results()
	{
		if (!current_user_can('administrator') || !WP_DEBUG || empty($this->test_results)) {
			return;
		}

		$pass_rate = ($this->passed_tests / $this->total_tests) * 100;
		$status_class = $pass_rate >= 90 ? 'excellent' : ($pass_rate >= 70 ? 'good' : 'needs-attention');

?>
		<div id="lsx-system-validation" style="
            position: fixed;
            bottom: 20px;
            right: 20px;
            max-width: 400px;
            background: #fff;
            border: 3px solid <?php echo $pass_rate >= 90 ? '#28a745' : ($pass_rate >= 70 ? '#ffc107' : '#dc3545'); ?>;
            border-radius: 8px;
            padding: 20px;
            z-index: 9999;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            max-height: 400px;
            overflow-y: auto;
        ">
			<div style="display: flex; justify-content: between; align-items: center; margin-bottom: 15px;">
				<h4 style="margin: 0; font-size: 16px; font-weight: 600;">
					LSX System Validation
				</h4>
				<button onclick="document.getElementById('lsx-system-validation').style.display='none'" style="
                    background: none;
                    border: none;
                    font-size: 18px;
                    cursor: pointer;
                    padding: 0;
                    margin-left: auto;
                ">×</button>
			</div>

			<div style="margin-bottom: 15px; padding: 10px; background: <?php echo $pass_rate >= 90 ? '#d4edda' : ($pass_rate >= 70 ? '#fff3cd' : '#f8d7da'); ?>; border-radius: 4px;">
				<strong>Overall Status:</strong> <?php echo $this->passed_tests; ?>/<?php echo $this->total_tests; ?> tests passed (<?php echo round($pass_rate, 1); ?>%)
			</div>

			<div style="max-height: 250px; overflow-y: auto;">
				<?php foreach ($this->test_results as $result): ?>
					<div style="
                        margin-bottom: 8px;
                        padding: 8px;
                        border-left: 3px solid <?php echo $result['status'] === 'PASS' ? '#28a745' : '#dc3545'; ?>;
                        background: <?php echo $result['status'] === 'PASS' ? '#f8fff9' : '#fff8f8'; ?>;
                        border-radius: 0 4px 4px 0;
                    ">
						<div style="font-weight: 600; color: <?php echo $result['status'] === 'PASS' ? '#155724' : '#721c24'; ?>;">
							<?php echo $result['status']; ?>: <?php echo esc_html($result['test']); ?>
						</div>
						<div style="font-size: 12px; color: #666; margin-top: 2px;">
							<?php echo esc_html($result['message']); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
<?php
	}
}

// Initialize the validator
new LSX_System_Validator();
