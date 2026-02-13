import sys

text = sys.argv[1].lower()

bad_words = ["idiota", "imbecil", "estupido"]

if any(word in text for word in bad_words):
    print(1)
else:
    print(0)
