import { mkdirSync, readdirSync } from 'node:fs';
import { join } from 'node:path';
import puppeteer from 'puppeteer';

const OUT_DIR = 'temporary screenshots';

const [, , url, label] = process.argv;
if (!url) {
  console.error('usage: node screenshot.mjs <url> [label]');
  process.exit(1);
}

mkdirSync(OUT_DIR, { recursive: true });

const existing = readdirSync(OUT_DIR).filter((f) => /^screenshot-\d+(-.*)?\.png$/.test(f));
const nextN = existing.reduce((max, f) => Math.max(max, parseInt(f.match(/^screenshot-(\d+)/)[1], 10)), 0) + 1;
const filename = label ? `screenshot-${nextN}-${label}.png` : `screenshot-${nextN}.png`;
const outPath = join(OUT_DIR, filename);

const browser = await puppeteer.launch({ headless: 'new' });
try {
  const page = await browser.newPage();
  await page.setViewport({ width: 1280, height: 800, deviceScaleFactor: 2 });
  await page.goto(url, { waitUntil: 'networkidle0', timeout: 30_000 });
  await page.screenshot({ path: outPath, fullPage: true });
  console.log(outPath);
} finally {
  await browser.close();
}
