# Fish Content — Import & Editorial Instructions

Purpose
- Step-by-step guidance to import the provided Fish content package (WXR / CSV / manual) into a WordPress site with the Fish Custom Post Type (CPT).
- Quick reference to understand the Fish CPT fields, taxonomies, meta keys and editorial QA expected for each species profile.

Audience
- Developers running imports
- Content editors who will review/finish the entries
- QA reviewers verifying import correctness

Prerequisites
- WordPress site with the Fish CPT registered (post_type = `fish`) and the `habitat` taxonomy.
- Create Block Theme / theme and field group(s) installed as required (e.g., SCF / ACF or equivalent).
- Admin access to WP admin and FTP/SFTP or CLI access to upload images if necessary.
- The WXR file (fish-content-import-wxr.xml) and the species markdown/CSV (optional) available locally.

Files supplied
- fish-content-import-wxr.xml — WXR export containing:
  - taxonomy terms (habitat)
  - attachments placeholders (attachment posts with URLs)
  - fish posts (post_type = fish) with postmeta keys starting with fish_ (e.g., fish_description, fish_habitat, fish_conservation_status)
- fish-species-content-brandon-fishing.md — human readable species profiles (source content)
- Optional: CSV/JSON mapping if supplied

Pre-import checklist
- [ ] Replace example site URLs in the WXR with your target site URL (see "Edit WXR URLs" below).
- [ ] Ensure habitat taxonomy exists, or allow import to create terms.
- [ ] Prepare the media (images) — either host them at the URLs in the WXR or plan to re-link post thumbnails after import.
- [ ] Ensure ACF/SCF fields or equivalent are registered and using meta keys fish_<name>.
- [ ] Backup the WP site and database.

Import methods (choose one)

A. Import WXR using WordPress Tools → Import (Recommended for complete package)
1. Tools → Import → WordPress → Install importer if needed → Run Importer.
2. Upload fish-content-import-wxr.xml.
3. Map authors (assign to existing user).
4. Enable "Download and import file attachments" if the attachment URLs are reachable from the running WP instance.
5. Run import and wait for completion.
6. Post-import: verify posts appear under "Fish" and habitats are present under Posts → Habitats (taxonomy).

Notes:
- If attachments are not reachable, the importer will create attachment posts but files won’t download. Use the "Replace attachment URLs" step below to re-link images.

B. WP-CLI bulk import (server/SSH)
- Place the WXR on the server (e.g., /tmp/fish-content-import-wxr.xml).
- Run:
  wp import /tmp/fish-content-import-wxr.xml --authors=create
- Use `--skip` flags as needed.
- After import, check `wp post list --post_type=fish`.

C. CSV or JSON import (if you prefer structured mapping)
- If you have a CSV of rows mapped to fish_* meta keys, use WP All Import or custom script.
- Recommended columns:
  - post_title, post_name (slug), post_content, post_excerpt
  - fish_description, fish_habitat (term slugs or names separated by |), fish_fishing_season (pipe or JSON array), fish_average_size_value, fish_average_size_unit, fish_preferred_bait, fish_conservation_status, fish_fun_fact, fish_personal_story
  - _thumbnail_id (attachment id) or thumbnail_filename for later linking

Editing the WXR before import
- Replace base URL placeholders:
  - Open the WXR in a text editor.
  - Replace every occurrence of `https://example.com` with your site base URL (e.g., `https://mydevsite.test`).
- Confirm term slugs match your habitat taxonomy; adjust <wp:term_slug> values if needed.
- If you will not import attachments, remove the `<wp:attachment_url>` blocks (optional) to avoid importer attempts.

Media handling and featured images
- WXR contains attachment posts (IDs 301–310). These rely on the original attachment URLs.
- If you can host the images at the same URLs, the importer may download them and keep the _thumbnail_id mapping.
- If not:
  - Option 1 (recommended): Upload images to Media Library (Media → Add New) before import and note their new attachment IDs; after import update `_thumbnail_id` postmeta for each fish (see "Update thumbnails" below).
  - Option 2: Run the import, then use a script to match images by filename and set thumbnails.

Update thumbnails (example WP-CLI)
- To set featured image by filename after importing:
  - Get attachment ID: wp media list --format=csv --fields=ID,file | grep fish-smallmouth-yellowfish.jpg
  - Set post thumbnail: wp post meta update <post_id> _thumbnail_id <attachment_id>
- Or use a PHP script to iterate fish posts and set `_thumbnail_id` where `fish_*` meta references a filename.

Taxonomy mapping notes
- fish_habitat in postmeta may be stored as pipe-delimited names in the sample WXR.
- Preferred: Ensure the habitat taxonomy has term slugs/names used in the WXR.
- If terms import as part of the WXR, verify they are assigned to the fish posts (check single fish page).

Field mapping & REST exposure
- All SCF/ACF meta keys use `fish_<field_name>`. Common keys in the WXR:
  - fish_description (WYSIWYG / postmeta)
  - fish_habitat (taxonomy mapping)
  - fish_fishing_season (string/array)
  - fish_average_size_value (number)
  - fish_average_size_unit (cm, kg, in, lb)
  - fish_preferred_bait (text)
  - fish_conservation_status (select value e.g., common, protected)
  - fish_fun_fact (short text)
  - fish_personal_story (WYSIWYG)
  - fish_gallery (if supported — may be array of attachment IDs)
  - fish_related (post IDs, optional)
- If using ACF, ensure fields are set to "Show in REST" (if you rely on WP REST responses).

Editorial QA (post-import checks)
- Verify each fish post:
  - Title, slug and content (fish_description) are present and properly formatted.
  - Featured Image displayed (or _thumbnail_id set).
  - fish_habitat links to correct taxonomy terms and shows on single/archive templates.
  - fish_average_size fields are numeric and unit set (default to "cm" if missing).
  - fish_conservation_status uses the allowed set (common/protected/threatened/endangered/localised/vulnerable) — normalise values if necessary.
  - fish_personal_story renders properly (WYSIWYG HTML allowed).
  - fish_fun_fact length <= 200 chars (trim or edit as needed).
- Accessibility:
  - Ensure each image in Media Library has alt text (edit via Media Library).
  - Check heading hierarchy on single-fish template (H1 = post title).
- SEO:
  - Set excerpt/meta description if needed.
  - Confirm permalink structure and canonical URLs.

Understanding the Fish content model (quick reference)
- Post type: fish
  - supports: title, editor (post_content), excerpt, featured image, author, revisions
- Taxonomy: habitat (hierarchical)
- Meta keys pattern: fish_<field_name>
  - fish_description – main descriptive HTML
  - fish_gallery – image attachments (array)
  - fish_habitat – taxonomy term(s)
  - fish_fishing_season – multi-select or pipe-separated string
  - fish_average_size_value – number
  - fish_average_size_unit – select string (cm, kg, in, lb)
  - fish_preferred_bait – short text
  - fish_conservation_status – single select value
  - fish_fun_fact – short text
  - fish_personal_story – long text / WYSIWYG
  - fish_related – array of related fish post IDs
  - fish_admin_notes – internal notes, not shown publicly

Sample REST check
- Verify REST exposure for a sample post:
  curl -s 'https://your-site.test/wp-json/wp/v2/fish?slug=smallmouth-yellowfish' | jq .
- Check postmeta presence if meta is exposed: GET /wp/v2/fish/<id>?_embed (or use ACF REST endpoints if applicable).

Common import issues & fixes
- Missing images: ensure importer can reach URLs or re-upload and re-link. Use WP-CLI or a small WP plugin to bulk reassign by filename.
- Taxonomy not assigned: create taxonomy terms first (or import them), then re-run a mapping script to set terms by name/slug.
- Wrong or missing meta keys: confirm the field group uses exact meta_key names fish_<...>. If using ACF, ensure "Save in postmeta" and meta_key mapping match.
- Data formats: fishing season values may be pipe-delimited — convert to array if using structured storage.
- Duplicate terms: use `wp term list habitat --format=csv` to inspect and clean duplicates.

Small scripts & commands (examples)

1) List all fish posts:
  wp post list --post_type=fish --fields=ID,post_title,post_status --format=table

2) Export fish CPT to CSV (for review):
  wp post list --post_type=fish --fields=ID,post_title,post_name --format=csv > fish-posts.csv

3) Bulk update a meta key (example set conservation to "common" if empty):
  wp db query "UPDATE wp_postmeta pm JOIN wp_posts p ON pm.post_id = p.ID SET pm.meta_value = 'common' WHERE p.post_type = 'fish' AND pm.meta_key = 'fish_conservation_status' AND (pm.meta_value = '' OR pm.meta_value IS NULL);"

Editorial guidance for content editors
- Each fish entry should be species-level (not catch log).
- Keep description concise (intro + 2–3 paragraphs) with identifying features and habitat.
- Quick facts must be accurate: average size numeric and unit selected.
- Add practical tips in Brandon’s notes — first person short anecdote is fine.
- Use consistent habitat term names (prefer canonical slugs).
- Add at least one featured image and alt text.
- For conservation status, use the controlled vocabulary; if unsure, choose "common" and flag for later review.
- Add gallery images where available (3–5 images max per species).

Post-import verification checklist
- [ ] All 10 supplied fish posts present and published.
- [ ] Habitat taxonomy has expected terms (Tugela River, Huttenspruit, Drakensberg Streams, Dams, Rocky Stretches, Slow Rivers, Backwaters, Warm Stillwaters, Deep Pools).
- [ ] Featured images set for each post.
- [ ] fish_description and fish_personal_story rendered correctly.
- [ ] fish_quick_facts fields present (size, unit, conservation status).
- [ ] fish_fishing_season values normalized.
- [ ] REST endpoint returns expected meta if used by front-end.
- [ ] Accessibility: images have alt text, pages pass basic contrast and heading checks.

If you want me to
- Produce a CSV mapping file (post_title → meta_key → value) for bulk import,
- Create a small WP-CLI script (PHP or bash) to reassign thumbnails and map habitats,
- Or generate an ACF JSON field-group export matching the fish_* meta keys,
tell me which you'd prefer and I’ll generate it.

References
- Fish CPT content model: docs/fishing-website/site-structure/fish-post-type-brandon-fishing.md
- Sample WXR: fish-content-import-wxr.xml (replace example URLs)
- Fish species content: docs/fishing-website/content-collection/fish-content-brandon-fishing.md
