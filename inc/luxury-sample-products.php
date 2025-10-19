<?php

/**
 * Sample Luxury Boot Products
 * Creates sample products for the luxury boot catalog
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

class LuxuryBootSampleData
{

	public function __construct()
	{
		// For development - always recreate sample products
		if (defined('WP_DEBUG') && WP_DEBUG) {
			delete_option('luxury_sample_products_created');
		}

		add_action('init', array($this, 'maybe_create_sample_products'), 500); // After taxonomies are registered
	}

	/**
	 * Create sample products if they don't exist (public method for forced creation)
	 */
	public function maybe_create_sample_products()
	{
		// First create taxonomy terms
		$this->create_taxonomy_terms();

		// Then create sample products (always recreate in debug mode)
		$this->create_sample_products();

		// Update flag only if not in debug mode
		if (!defined('WP_DEBUG') || !WP_DEBUG) {
			update_option('luxury_sample_products_created', true);
		}
	}

	/**
	 * Create required taxonomy terms
	 */
	private function create_taxonomy_terms()
	{
		$taxonomy_terms = array(
			'heel_height' => array('low', 'medium', 'high', 'extra-high'),
			'material' => array('italian-leather', 'patent-leather', 'suede', 'fabric'),
			'finish' => array('glossy', 'matte'),
			'collection' => array('heritage', 'modern-classic', 'avant-garde', 'limited-edition', 'seasonal'),
			'brand' => array('GUCCI', 'Louis Vuitton', 'Prada', 'Saint Laurent', 'Christian Louboutin', 'Balenciaga'),
			'country' => array('italy', 'france'),
			'color' => array('black'),
			'silhouette' => array('ankle-boot', 'platform-boot', 'combat-boot'),
			'closure' => array('zipper', 'lace-up')
		);

		foreach ($taxonomy_terms as $taxonomy => $terms) {
			foreach ($terms as $term) {
				if (!term_exists($term, $taxonomy)) {
					wp_insert_term($term, $taxonomy);
				}
			}
		}
	}

	/**
	 * Create luxury boot product samples
	 */
	private function create_sample_products()
	{
		$products = array(
			array(
				'title' => 'GUCCI Aria Leather Ankle Boot',
				'content' => $this->get_gucci_content(),
				'taxonomies' => array(
					'heel_height' => 'high',
					'material' => 'italian-leather',
					'finish' => 'glossy',
					'collection' => 'heritage',
					'brand' => 'GUCCI',
					'country' => 'italy',
					'color' => 'black',
					'silhouette' => 'ankle-boot',
					'closure' => 'zipper'
				),
				'meta' => array(
					'_product_price' => '1850',
					'_product_sku' => 'GUC-AR-001',
					'_product_featured' => 'yes',
					'_product_size_range' => '35-42 EU',
					'_product_care_instructions' => 'Professional leather care recommended',
					'_product_made_in' => 'Made in Italy',
					'_lsx_sample_product' => '1'
				)
			),
			array(
				'title' => 'Louis Vuitton LV Archlight Boot',
				'content' => $this->get_louis_vuitton_content(),
				'taxonomies' => array(
					'heel_height' => 'medium',
					'material' => 'patent-leather',
					'finish' => 'glossy',
					'collection' => 'modern-classic',
					'brand' => 'Louis Vuitton',
					'country' => 'france',
					'color' => 'black',
					'silhouette' => 'platform-boot',
					'closure' => 'lace-up'
				),
				'meta' => array(
					'_product_price' => '2200',
					'_product_sku' => 'LV-AL-002',
					'_product_featured' => 'yes',
					'_product_size_range' => '35-41 EU',
					'_product_care_instructions' => 'Avoid water exposure, professional care only',
					'_product_made_in' => 'Made in France',
					'_lsx_sample_product' => '1'
				)
			),
			array(
				'title' => 'Prada Monolith Combat Boot',
				'content' => $this->get_prada_content(),
				'taxonomies' => array(
					'heel_height' => 'low',
					'material' => 'italian-leather',
					'finish' => 'matte',
					'collection' => 'avant-garde',
					'brand' => 'Prada',
					'country' => 'italy',
					'color' => 'black',
					'silhouette' => 'combat-boot',
					'closure' => 'lace-up'
				),
				'meta' => array(
					'_product_price' => '1650',
					'_product_sku' => 'PRA-MC-003',
					'_product_featured' => 'no',
					'_product_size_range' => '36-42 EU',
					'_product_care_instructions' => 'Clean with soft dry cloth, condition monthly',
					'_product_made_in' => 'Made in Italy',
					'_lsx_sample_product' => '1'
				)
			),
			array(
				'title' => 'Saint Laurent Opyum Ankle Boot',
				'content' => $this->get_saint_laurent_content(),
				'taxonomies' => array(
					'heel_height' => 'extra-high',
					'material' => 'patent-leather',
					'finish' => 'glossy',
					'collection' => 'heritage',
					'brand' => 'Saint Laurent',
					'country' => 'italy',
					'color' => 'black',
					'silhouette' => 'ankle-boot',
					'closure' => 'zipper'
				),
				'meta' => array(
					'_product_price' => '1790',
					'_product_sku' => 'SL-OP-004',
					'_product_featured' => 'yes',
					'_product_size_range' => '35-41 EU',
					'_product_care_instructions' => 'Polish with patent leather cream',
					'_product_made_in' => 'Made in Italy',
					'_lsx_sample_product' => '1'
				)
			),
			array(
				'title' => 'Christian Louboutin So Kate Booty',
				'content' => $this->get_louboutin_content(),
				'taxonomies' => array(
					'heel_height' => 'extra-high',
					'material' => 'suede',
					'finish' => 'matte',
					'collection' => 'limited-edition',
					'brand' => 'Christian Louboutin',
					'country' => 'italy',
					'color' => 'black',
					'silhouette' => 'ankle-boot',
					'closure' => 'zipper'
				),
				'meta' => array(
					'_product_price' => '1995',
					'_product_sku' => 'CL-SK-005',
					'_product_featured' => 'yes',
					'_product_size_range' => '35-42 EU',
					'_product_care_instructions' => 'Suede brush and waterproof spray recommended',
					'_product_made_in' => 'Made in Italy',
					'_lsx_sample_product' => '1'
				)
			),
			array(
				'title' => 'Balenciaga Track Hike Boot',
				'content' => $this->get_balenciaga_content(),
				'taxonomies' => array(
					'heel_height' => 'low',
					'material' => 'fabric',
					'finish' => 'matte',
					'collection' => 'seasonal',
					'brand' => 'Balenciaga',
					'country' => 'italy',
					'color' => 'black',
					'silhouette' => 'platform-boot',
					'closure' => 'lace-up'
				),
				'meta' => array(
					'_product_price' => '1350',
					'_product_sku' => 'BAL-TH-006',
					'_product_featured' => 'no',
					'_product_size_range' => '35-43 EU',
					'_product_care_instructions' => 'Machine washable, air dry only',
					'_product_made_in' => 'Made in Italy',
					'_lsx_sample_product' => '1'
				)
			)
		);

		foreach ($products as $product_data) {
			$this->create_product($product_data);
		}
	}

	/**
	 * Create individual product
	 */
	private function create_product($data)
	{
		// Create the post
		$post_id = wp_insert_post(array(
			'post_title' => $data['title'],
			'post_content' => $data['content'],
			'post_status' => 'publish',
			'post_type' => 'product',
			'post_author' => 1,
		));

		if (is_wp_error($post_id)) {
			return false;
		}

		// Add taxonomies
		foreach ($data['taxonomies'] as $taxonomy => $term) {
			wp_set_object_terms($post_id, $term, $taxonomy);
		}

		// Add meta data
		foreach ($data['meta'] as $key => $value) {
			update_post_meta($post_id, $key, $value);
		}

		return $post_id;
	}

	/**
	 * GUCCI product content
	 */
	private function get_gucci_content()
	{
		return '<div class="luxury-product-description">
            <h2>Exquisite Italian Craftsmanship</h2>
            <p>The GUCCI Aria Leather Ankle Boot embodies the pinnacle of Italian luxury footwear. Crafted from the finest premium leather in Florence, each boot is meticulously constructed using traditional techniques passed down through generations of skilled artisans.</p>

            <h3>Distinctive Features</h3>
            <ul>
                <li><strong>Premium Italian Leather:</strong> Sourced from renowned Tuscan tanneries</li>
                <li><strong>Hand-finished Details:</strong> Signature GUCCI hardware and stitching</li>
                <li><strong>Comfort Engineering:</strong> Cushioned insole with arch support</li>
                <li><strong>Timeless Design:</strong> Classic silhouette with contemporary edge</li>
            </ul>

            <h3>Care & Maintenance</h3>
            <p>To preserve the beauty and longevity of your GUCCI boots, we recommend professional leather care services. Store in provided dust bags and avoid exposure to direct sunlight or moisture.</p>

            <blockquote class="luxury-quote">
                "Each pair represents our commitment to uncompromising quality and Italian heritage."
                <cite>— GUCCI Atelier</cite>
            </blockquote>
        </div>';
	}

	/**
	 * Louis Vuitton product content
	 */
	private function get_louis_vuitton_content()
	{
		return '<div class="luxury-product-description">
            <h2>French Excellence Redefined</h2>
            <p>The Louis Vuitton LV Archlight Boot showcases the Maison\'s innovative approach to luxury footwear. This architectural marvel combines cutting-edge design with traditional French savoir-faire, creating a statement piece that transcends seasonal trends.</p>

            <h3>Innovative Design Elements</h3>
            <ul>
                <li><strong>Architectural Silhouette:</strong> Sculptural lines inspired by modern architecture</li>
                <li><strong>Patent Leather Finish:</strong> Mirror-like surface for maximum impact</li>
                <li><strong>Comfort Technology:</strong> Advanced cushioning system</li>
                <li><strong>Signature Details:</strong> Embossed LV monogram elements</li>
            </ul>

            <h3>Artisanal Process</h3>
            <p>Each boot requires over 100 individual steps to complete, performed by master craftspeople in our French ateliers. The patent leather undergoes a specialized treatment process to achieve its distinctive lustrous finish.</p>

            <blockquote class="luxury-quote">
                "Innovation and tradition unite in perfect harmony."
                <cite>— Louis Vuitton Design Studio</cite>
            </blockquote>
        </div>';
	}

	/**
	 * Prada product content
	 */
	private function get_prada_content()
	{
		return '<div class="luxury-product-description">
            <h2>Avant-Garde Luxury</h2>
            <p>The Prada Monolith Combat Boot represents the brand\'s fearless approach to contemporary design. This bold interpretation of military-inspired footwear elevates utilitarian aesthetics to high fashion status, perfect for the modern luxury consumer.</p>

            <h3>Design Philosophy</h3>
            <ul>
                <li><strong>Military Heritage:</strong> Combat boot silhouette reimagined for luxury</li>
                <li><strong>Premium Construction:</strong> Full-grain Italian leather throughout</li>
                <li><strong>Modern Proportions:</strong> Exaggerated sole for contemporary appeal</li>
                <li><strong>Prada DNA:</strong> Signature triangle logo in brushed metal</li>
            </ul>

            <h3>Technical Specifications</h3>
            <p>Features include reinforced toe construction, moisture-wicking lining, and a specialized rubber compound sole for superior traction and durability. The lacing system utilizes marine-grade hardware for both function and aesthetic appeal.</p>

            <blockquote class="luxury-quote">
                "Where function meets the future of fashion."
                <cite>— Prada Design Team</cite>
            </blockquote>
        </div>';
	}

	/**
	 * Saint Laurent product content
	 */
	private function get_saint_laurent_content()
	{
		return '<div class="luxury-product-description">
            <h2>Parisian Sophistication</h2>
            <p>The Saint Laurent Opyum Ankle Boot epitomizes the maison\'s rock-and-roll glamour aesthetic. This statement boot combines architectural lines with sensual curves, creating an unmistakably powerful silhouette that embodies the Saint Laurent woman\'s confidence.</p>

            <h3>Signature Elements</h3>
            <ul>
                <li><strong>Iconic YSL Hardware:</strong> Gold-tone logo heel detail</li>
                <li><strong>Architectural Heel:</strong> Sculptural 105mm stiletto construction</li>
                <li><strong>Premium Patent:</strong> High-gloss finish for maximum impact</li>
                <li><strong>Perfect Proportions:</strong> Elongating silhouette design</li>
            </ul>

            <h3>Craftsmanship Heritage</h3>
            <p>Handcrafted in Italian workshops using techniques refined over decades, each boot undergoes rigorous quality control. The patent leather treatment involves a multi-stage process to achieve the signature Saint Laurent luster.</p>

            <blockquote class="luxury-quote">
                "Elegance is refusal - the essence of Saint Laurent style."
                <cite>— Anthony Vaccarello, Creative Director</cite>
            </blockquote>
        </div>';
	}

	/**
	 * Christian Louboutin product content
	 */
	private function get_louboutin_content()
	{
		return '<div class="luxury-product-description">
            <h2>The Art of Seduction</h2>
            <p>The Christian Louboutin So Kate Booty embodies the designer\'s philosophy that shoes should be "like jewels" for the feet. This ankle boot iteration of the iconic So Kate silhouette delivers the same leg-lengthening effect with added versatility and edge.</p>

            <h3>Iconic Features</h3>
            <ul>
                <li><strong>Signature Red Sole:</strong> The unmistakable Louboutin trademark</li>
                <li><strong>120mm Stiletto:</strong> Perfectly proportioned for elegance and comfort</li>
                <li><strong>Luxurious Suede:</strong> Buttery-soft texture with rich depth</li>
                <li><strong>Pointed Toe:</strong> Elongating silhouette for maximum sophistication</li>
            </ul>

            <h3>Artisanal Excellence</h3>
            <p>Each boot is handcrafted by skilled artisans who specialize in luxury footwear construction. The suede undergoes careful selection and treatment to ensure consistent texture and color depth, while the signature red lacquered sole is applied by hand in multiple layers.</p>

            <blockquote class="luxury-quote">
                "A shoe has so much more to offer than just to walk."
                <cite>— Christian Louboutin</cite>
            </blockquote>
        </div>';
	}

	/**
	 * Balenciaga product content
	 */
	private function get_balenciaga_content()
	{
		return '<div class="luxury-product-description">
            <h2>Future-Forward Design</h2>
            <p>The Balenciaga Track Hike Boot represents the brand\'s commitment to pushing boundaries in luxury fashion. This hybrid design merges athletic functionality with high-fashion aesthetics, creating a boot that\'s equally at home on city streets or fashion runways.</p>

            <h3>Innovation Highlights</h3>
            <ul>
                <li><strong>Hybrid Construction:</strong> Technical fabrics meet luxury craftsmanship</li>
                <li><strong>Athletic Heritage:</strong> Performance-inspired design elements</li>
                <li><strong>Sustainable Materials:</strong> Eco-conscious fabric selections</li>
                <li><strong>Modular Design:</strong> Removable components for customization</li>
            </ul>

            <h3>Technical Performance</h3>
            <p>Features advanced moisture-wicking technology, reinforced stress points, and a specialized sole compound developed in collaboration with athletic footwear experts. The boot maintains luxury aesthetics while delivering genuine performance capabilities.</p>

            <blockquote class="luxury-quote">
                "Luxury is the freedom to choose what you want to wear."
                <cite>— Demna Gvasalia, Creative Director</cite>
            </blockquote>
        </div>';
	}
}

// Initialize the sample data creator
new LuxuryBootSampleData();
