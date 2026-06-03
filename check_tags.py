import re
import os

for root, dirs, files in os.walk('resources/views'):
    for file in files:
        if file.endswith('.blade.php'):
            filepath = os.path.join(root, file)
            try:
                with open(filepath, 'r') as f:
                    content = f.read()
                content_stripped = re.sub(r'\{\{.*?\}\}', '', content)
                content_stripped = re.sub(r'\{!!.*?!!\}', '', content_stripped)
                content_stripped = re.sub(r'<\?php.*?\?>', '', content_stripped, flags=re.DOTALL)
                
                divs = re.findall(r'<(div\b[^>]*>)|(</div\s*>)', content_stripped, re.IGNORECASE)
                opened = 0
                closed = 0
                for op, cl in divs:
                    if op:
                        opened += 1
                    elif cl:
                        closed += 1
                if opened != closed:
                    print(f"Mismatch in {filepath}: open={opened}, close={closed}, diff={opened-closed}")
            except Exception as e:
                pass
