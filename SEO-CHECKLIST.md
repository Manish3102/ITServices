# SEO Fixes – Checkpoint List

All items below have been implemented. Use this list to verify on your side.

---

## 1. On-Page SEO (Title & Meta Description)

| Page | Status | What was done |
|------|--------|----------------|
| **Home** | Done | Title: `Techscalify \| Web Development & Software Development Company`. Meta: professional web, software, digital marketing, IT consulting. |
| **Web Development** | Done | Title: `Professional Web Development Services \| Techscalify`. Meta: custom website, e-commerce, business websites. |
| **Software Development** | Done | Title: `Custom Software Development Services \| Techscalify`. Meta: software company, business solutions, enterprise. |
| **App Development** | Done | Title: `Mobile App Development Services \| Techscalify`. Meta: iOS/Android, custom apps. |
| **IT Strategy Consulting** | Done | Title: `IT Strategy Consulting Services \| Techscalify`. Meta: align tech with business, digital transformation. |
| **Search Growth Optimization** | Done | Title: `Search Growth Optimization & SEO Services \| Techscalify`. Meta: technical SEO, content, link building. |
| **Technical Support** | Done | Title: `Technical Support & Managed IT Services \| Techscalify`. Meta: 24/7 support, managed IT. |
| **Contact** | Done | Title: `Contact Us \| Techscalify`. Meta: phone, email, Raipur. |
| **About** | Done | Title: `About Us \| Techscalify - IT Services & Digital Solutions`. Meta: mission, team, IT solutions. |
| **Thank You** | Done | Title: `Thank You \| Techscalify`. Meta: message received. |

**File:** `layout/header.php` – Uses `$page_title` and `$page_meta_description` (each page sets these before including the header).

---

## 2. Heading Structure (H1 / H2)

| Page | Status | What was done |
|------|--------|----------------|
| **Home** | Done | Hero: `<h1>` “Leading Global IT Services.” Section “Explore Our Services”: `<h2>`. Service cards: `<h2>` for each service title. |
| **Web Development** | Done | Page header: `<h1>`. Section titles: `<h2>` (e.g. “Build High-Performance Websites…”, “Our Web Development Approach”). |
| **Software Development** | Done | Page header: `<h1>`. |
| **App Development** | Done | Page header: `<h1>`. |
| **IT Strategy Consulting** | Done | Page header: `<h1>`. |
| **Search Growth Optimization** | Done | Page header: `<h1>`. |
| **Technical Support** | Done | Page header: `<h1>`. |
| **Contact** | Done | Page header: `<h1> Contact Us`. |
| **About** | Done | Page header: `<h1> About Us`. |
| **Thank You** | Done | Page header: `<h1> Thank You`. |

---

## 3. Internal Links

| Location | Status | What was done |
|----------|--------|----------------|
| **Breadcrumbs** | Done | All `index.html` → `index.php` (contact, about, all service pages). |
| **Home – Hero** | Done | “Explore Our Services” → `index.php#services`. |
| **Home – Services section** | Done | Added `id="services"` to the services section. All service links point to correct `.php`: Web Development, Software, SEO & Digital Marketing, Social Media, IT Consulting, Technical Support. “Find your solution” → `index.php#services`. |
| **Home – CTA** | Done | “Contact Us” → `contact.php`. |
| **Home – Case studies** | Done | Links → `index.php#services` or the matching service page (e.g. SEO, Software, Technical Support). “View All Portfolio” → `index.php#services`. |
| **Home – Blog** | Done | “View All” and blog links → `index.php` (no blog pages yet). |
| **Footer** | Done | IT Services links → `technical-support.php`, `it-consulting.php`, `software-development.php`, `web-development.php`, `search-optimization.php`. Quick Links already used `index.php`, `contact.php`, `about.php`. |
| **Component services** | Done | All service links in `component/services.php` → correct `.php` pages. “Find your solution” → `index.php#services`. |
| **About** | Done | `about.html` → `about.php`, `contact.html` → `contact.php`. |
| **Service pages** | Done | Breadcrumb Home → `index.php`. CTA “Contact” / “Get a Quote” → `contact.php`. |
| **Search Optimization & Technical Support** | Done | Internal service links → `search-optimization.php` (no more `service-d-consulting.html`). |

---

## 4. Schema Markup (Organization)

| Item | Status | What was done |
|------|--------|----------------|
| **Organization JSON-LD** | Done | Added in `layout/header.php`: name, url, logo, description, sameAs (social), contactPoint (phone, email), address (Raipur, Chhattisgarh, IN), service array (Web Development, Software Development, Digital Marketing, IT Consulting). |

---

## 5. Other Fixes

| Item | Status | What was done |
|------|--------|----------------|
| **Favicon type** | Done | `type="img/techscalify.png"` → `type="image/png"` in `layout/header.php`. |
| **Technical Support page title** | Done | Page header and breadcrumb text changed from “Search Growth Optimization Services” to “Technical Support & Managed IT” in `technical-support.php`. |

---

## 6. Files Modified

- `layout/header.php` – Dynamic title/meta, favicon, Organization schema.
- `layout/footer.php` – Footer service links.
- `index.php` – H1, H2, `#services`, all internal links.
- `contact.php` – Page meta, H1, breadcrumb.
- `about.php` – Page meta, H1, breadcrumb, internal links.
- `thank-you.php` – Page meta, H1.
- `web-development.php` – Page meta, H1/H2, breadcrumb, contact link.
- `software-development.php` – Page meta, H1, breadcrumb, contact link.
- `app-development.php` – Page meta, H1, breadcrumb, contact link.
- `it-consulting.php` – Page meta, H1, breadcrumb.
- `search-optimization.php` – Page meta, H1, breadcrumb, internal links, contact link.
- `technical-support.php` – Page meta, correct H1/title “Technical Support & Managed IT”, breadcrumb, internal links, contact link.
- `component/services.php` – All service and “Find your solution” links.

---

## Quick verification

1. **Titles:** Open each page and check the browser tab title.
2. **Meta:** View page source and check `<meta name="description" content="...">`.
3. **H1:** Each page should have exactly one main `<h1>`.
4. **Links:** Click “Explore Our Services”, each service “Read More”, footer service links, and Contact/About – all should open the correct `.php` pages or anchors.
5. **Schema:** View page source and search for `application/ld+json` – Organization block should be present.
6. **Favicon:** Check tab icon (should use `image/png`).

---

*Generated after SEO fixes. Update this file if you add new pages or change titles/meta.*
