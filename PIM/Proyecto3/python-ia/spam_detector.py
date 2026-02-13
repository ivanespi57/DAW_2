import sys

text = sys.argv[1].lower()

spam_words = ["gratis", "haz clic", "oferta", "gana dinero"]

if any(word in text for word in spam_words):
    print(1)
else:
    print(0)
