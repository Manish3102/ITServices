import re
from pathlib import Path

root = Path(__file__).resolve().parents[1]
pattern = re.compile(r"<!--.*?(Mirrored from|HTTrack|Website Copier).*?-->", re.IGNORECASE)

count = 0
for p in root.rglob('*.html'):
    text = p.read_text(encoding='utf-8')
    new_text = pattern.sub('', text)
    if new_text != text:
        p.write_text(new_text, encoding='utf-8')
        count += 1

print(f"Processed HTML files. Modified {count} file(s).")
