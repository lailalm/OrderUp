# CLAUDE.md

## Always Do First
- **Invoke the `frontend-design` skill** before writing any frontend code, every session, no exceptions.

## Screenshot workflow

Use this whenever you need to visually verify frontend changes — layout, spacing, colors, responsive breakpoints — before reporting a task as done. Typecheck and unit tests don't catch visual regressions; screenshots do.

- **Tool:** `puppeteer` (dev dependency). The capture script is `screenshot.mjs` at the project root — use it as-is, do not reinvent it.
- **Dev server must be running** first (`php artisan serve`), default at `http://127.0.0.1:8000/`.
- **Capture:**
  ```
  node screenshot.mjs <url>                # saves temporary screenshots/screenshot-N.png
  node screenshot.mjs <url> <label>        # saves temporary screenshots/screenshot-N-<label>.png
  ```
  `N` auto-increments — files are never overwritten, so you can keep before/after pairs.
- **Review:** read the PNG with the Read tool. Claude sees the image directly and can critique it.
- **check each pass:** spacing / padding, font size / weight / line-height, exact hex colors, alignment, border-radius, shadows, image sizing, and responsive breakpoints.
- **Clean up:** `temporary screenshots/` is gitignored; don't commit its contents.
