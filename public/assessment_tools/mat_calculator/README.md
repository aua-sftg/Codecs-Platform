# CODECS MAT: delivery for the CODECS portal

Two pages of content for the portal to place in its own templates:

1. **A landing page** that describes the Multicriteria Analysis Tool (MAT) and
   leads to the calculator.
2. **The MAT calculator** itself.

Neither page has a header, menu, page title or footer; the portal supplies all
of these. It is a static front end with no backend, no API calls and no
database. All the evidence the calculator needs is already inside the script.

| File | What it is |
|---|---|
| `landing.html` | The landing page: what MAT is, what it can do and how it calculates. Plain HTML, no script. |
| `calculator.html` | The calculator page: the element the calculator mounts into, and the two files below. |
| `codecs-mat.js` | The calculator: one classic script (not an ES module) with no dependencies (≈ 395 kB, ≈ 91 kB gzipped). |
| `codecs-mat.css` | The styles of both pages (≈ 24 kB). |
| `build-info.json` | The version, the commit, and the data this build contains: workbook, schema, record counts. |

To try it, open `landing.html` straight from disk: its buttons open
`calculator.html`. Without the portal's Poppins font, both pages fall back to
the system sans-serif.

The file names stay the same in every delivery. To update, replace the files.

## Landing page

Place the landing page in the portal's page template:

```html
<!-- in <head>, after the portal's own CSS -->
<link rel="stylesheet" href="/mat/codecs-mat.css?v=1.0.0">

<!-- in the page body: the whole .mat-landing element from landing.html -->
<div class="mat-root mat-landing"> … </div>
```

- **Page title.** The page title is not included; the portal's page header
  provides it ("Multicriteria Analysis Tool"). The headings in the content
  start at `<h2>`.
- **Link to the calculator.** The two "Go to the calculator" buttons point to
  `calculator.html`. Set their `href` to the calculator's address on the
  portal. Both carry the attribute `data-mat-tool-link`, so they are easy to
  find.
- **No script.** The landing page has no script and no inline styles.

## Calculator

Add three things to the calculator's page template:

```html
<!-- in <head>, after the portal's own CSS -->
<link rel="stylesheet" href="/mat/codecs-mat.css?v=1.0.0">

<!-- where the calculator should appear, e.g. inside the page's .container -->
<div data-codecs-mat></div>

<!-- before </body> -->
<script src="/mat/codecs-mat.js?v=1.0.0" defer></script>
```

`/mat/` is only an example; any path works, because the files don't reference
each other. The `?v=` suffix makes browsers download a new delivery. Set it to
the `version` in `build-info.json`.

When the document is ready, the script fills every element that has the
`data-codecs-mat` attribute. For pages that create the element later, for
example after client-side navigation:

```js
CodecsMAT.mount(document.querySelector('#some-element'))  // or a selector string
CodecsMAT.unmount(element)                                  // before the element is removed
CodecsMAT.version  // { tool, workbook, schemaVersion, dataGeneratedAt }
```

## Layout and styling

- **Width.** Both pages fill their container and have no fixed width of their
  own. They are designed for Bootstrap's `.container` and down to phone width
  (~360 px).
- **Font.** Both pages use Poppins at weights 400, 500, 600 and 700, which the
  portal already loads. If Poppins is missing they fall back to the system
  sans-serif. The delivery contains no fonts.
- **Isolation.** Every CSS rule is scoped under `.mat-root`, the outer element
  of both pages, and all class names start with `mat-`. The pages leave the
  portal's styles alone and don't depend on Bootstrap.
- **Colours.** They use the CODECS palette (`#1c64b6` blue, `#a0b63c` green)
  and a light theme only.
- **Sticky header.** The calculator's internal links scroll back to the top of
  the calculator. If the portal header is sticky, pass its height so it does
  not cover the calculator's heading:

  ```css
  [data-codecs-mat] { --mat-scroll-offset: 90px; }
  ```

## Security and privacy

- The pages make no network requests beyond their own files: no fetch, XHR,
  analytics, fonts or images from elsewhere.
- They use no cookies, `localStorage` or `sessionStorage`. Everything the user
  enters in the calculator exists only in the open page.
- They use no `eval` and no inline `<script>`, so they work under a
  Content-Security-Policy with `script-src 'self'`. Styles come from the
  `.css` file. The landing page has no inline styles at all; in the calculator,
  the only inline styles are those React sets on elements, such as bar widths.
- The calculator needs no URL routing: it keeps its state in memory and does
  not change the URL or the page title.

## What the calculator contains

The calculator analyses the multicriteria assessments of 9 CODECS
Living Labs: 290 assessments of 27 economic,
environmental and social criteria, in four modules (Analysis, Compare,
Rankings, Custom case). It also includes a short introduction and a
methodology section, because the results cannot be read correctly without
them. The landing page uses the same texts.

The data comes from `CODECS_MCA_Tool_V12_FINAL_DV.xlsx` (UNIPI, Task 7.3). When the evidence
changes, we send a new build, and `build-info.json` shows which workbook it
contains.

## Building from source

For the MAT team:

```bash
cd app
npm ci
npm run build:embed     # → app/dist-embed/
```
