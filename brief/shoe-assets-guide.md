# **Assets Guide**

**\[Theme / Project Name\]: Luxury Black Heels Demo**  
 *Guidelines for preparing and supplying assets for a WordPress Block Theme project.*

---

## **0\. Deliverables**

* Clear file submission process for all media and content assets.

* Standardised folder structure aligned to the site map.

* Recommended file formats (logos, images, icons, video, audio).

* Naming conventions (lowercase, hyphenated, dimension-aware).

* Image/icon/video/audio specs \+ metadata (alt, captions).

* Best practices for stock sourcing \+ rights.

---

## **1\. Purpose**

* Provide clients a simple, repeatable way to supply content.

* Standardise structures across projects to reduce friction.

* Prevent delays from misnamed/misformatted files.

* Ensure assets are web-ready and block-theme compatible.

---

## **2\. How to Use this Guide**

**For Clients**

1. Read §3 Media Submission Guide.

2. Copy the folder tree in §4 to Google Drive/Dropbox.

3. Save files in §5 formats only.

4. Follow §6 naming *exactly*.

5. Include text metadata (alt/captions) with images (see §7).

**For Developers**

* Use this template as a prompt/checklist.

* Extend per project (e.g., WooCommerce vs corporate).

* Validate rights/permissions before publishing.

---

## **3\. Media Submission Guide**

* Use **lowercase** filenames; **hyphens** between words.

* **No spaces / no underscores**.

* **Do not resize**: submit originals. We’ll export responsive sizes.

* Group by **content type and page**.

* Include a **metadata sheet** (CSV/Sheet) for images: `filename, alt, caption, credit, license, page`.

---

## **4\. Shared Folder Structure**

Mirror top-level pages (based on your text sitemap).

`/lbh-project/                            ← main project folder`  
  `/branding/`  
    `/logo/masters/`  
    `/logo/exports/`  
    `brand-guide.pdf`  
  `/content/`  
    `/home/`  
    `/about/`  
      `/team/`  
      `/our-reviews/`  
      `/our-partners/`  
    `/services/`  
      `/service-1/`  
        `/sub-service-1/`  
        `/sub-service-2/`  
      `/service-2/`  
      `/service-3/`  
    `/contact/`  
    `/legal/`  
      `/privacy-policy/`  
      `/legal-disclaimer/`  
      `/terms-and-conditions/`  
  `/images/`  
    `/global/`  
    `/banners/`  
    `/products/`  
    `/team-portraits/`  
    `/press-logos/`  
  `/icons/ (svg only)`  
  `/video/`  
    `/hero/`  
    `/product/`  
  `/audio/`  
  `/docs/`  
    `image-metadata.csv  ← alt, caption, credit, license`  
    `release-forms/      ← model/property releases if applicable`

**Logos example filenames**

`client-logo-airbnb.svg`  
`client-logo-uber.png`  
`client-logo-microsoft.jpg`

---

## **5\. Recommended File Formats**

* **Logos:** **SVG** (preferred), AI/EPS (source), PDF (guide), PNG (transparent), JPG (fallback).

* **Images:** **PNG/JPG/WebP** (highest resolution, RGB). GIF only if truly needed.

* **Icons:** **SVG only** (single colour where possible).

* **Video:** **MP4 (H.264)** primary, **WebM** alternative (VP9/AV1 if available).

* **Audio:** **MP3** (128–192 kbps spoken / 256 kbps music) or **WAV** masters.

* **Colour profile:** sRGB for all web imagery.

---

## **6\. Naming Conventions**

**Rules**

* lowercase only; hyphens `-`; no spaces/underscores; include key attributes (page/type/subject/size).

* Optional: add dimensions or variant tags at the end.

**Patterns & Examples**

`project screenshots   → project-lbh-homepage-hero.png`  
`static page icons     → page-about-values-icon.svg`  
`banner images         → banner-home-1920x600.jpg`  
`product photos        → product-obsidian-heel-side-1200x1200.jpg`  
`team portraits        → portrait-van-der-merwe-seren-512x512.jpg`  
`logo exports          → lbh-logo-primary-light.svg`  
`press logos           → press-logo-vogue.svg`  
`video                 → hero-lookbook-fw25-1080p.mp4`  
`audio                 → bg-ambient-heel-clicks-60s.mp3`

---

## **7\. Images**

**Recommended Target Dimensions (we’ll export from originals)**

* **Banners/Hero:** **1920×600** (desktop), **1440×540**, **1280×480**, **768×432** (auto-crop).

* **Featured (cards):** **1200×600**.

* **WooCommerce products:** **1200×1200** (upload ≥1600×1600 original if possible).

* **Profile pics:** **512×512**.

* **Press logos (svg preferred):** **vector**; if raster, provide ≥1000px width.

**Quality & Compression**

* JPG 82–90%, PNG only when transparency/detail required.

* Provide **originals**; we’ll convert/add **WebP** sources.

* Strip EXIF (we’ll handle in build).

**Metadata (supply via CSV)**

* **Alt:** what/why, concise and literal.

* **Caption:** short context line (credit if needed).

* **Title:** human-readable asset name.

* **Description:** optional long form (for galleries).

**Alt Examples**

* `product-obsidian-heel-side.jpg → "Black stiletto ankle boot in polished leather, side view"`

* `banner-home-1920x600.jpg → "Editorial hero of black high-heel boots with gold hardware"`

**Stock Sources (free)**

* Unsplash, Pexels, Pixabay (confirm licences/attribution). Avoid watermarks.

---

## **8\. Videos**

**Formats & Specs**

* **MP4 (H.264)** 1080p recommended; 720p acceptable for background loops.

* **Frame rate:** 24/25/30 fps (match source).

* **Bitrate:** 4–8 Mbps (hero 1080p), 2–4 Mbps (background).

* **Audio:** remove on background loops (or ≤-20 LUFS).

* **Poster image:** provide a JPG/WebP poster per video (`filename-poster-1280x720.jpg`).

**Hosting Options**

* **Embed** (YouTube/Vimeo) for marketing pieces.

* **Self/CDN** for subtle loops (short, muted, ≤10s, ≤8MB if possible).

---

## **9\. Audio**

* **Formats:** MP3 (128–192 kbps speech / 256 kbps music) or WAV master.

* **Use cases:** podcasts, interviews, ambient loops.

* **Naming:** `audio-[context]-[length].mp3` (e.g., `audio-collection-intro-30s.mp3`).

* Provide basic transcript for accessibility where applicable.

---

## **10\. Why This Works**

* Reduces rework with **predictable** structures and names.

* Ensures everything is **web-ready** for block themes and WooCommerce.

* Speeds dev handoff with **metadata-rich** assets.

* Keeps brand execution **consistent** across pages and devices.

---

## **Quick Operational Checklists**

### **Client Pre-flight**

* ☐ Folders match §4 structure

* ☐ Filenames lowercase \+ hyphenated

* ☐ Originals provided (no manual resizing)

* ☐ `image-metadata.csv` completed (alt/captions/credits)

* ☐ Licences/permissions confirmed (stock, logos, models)

### **Dev Intake**

* ☐ Convert responsive sets \+ WebP

* ☐ Optimise (lossy/lossless per asset)

* ☐ Generate posters for videos

* ☐ Map assets to blocks/templates

* ☐ QA alt text, captions, and rights

