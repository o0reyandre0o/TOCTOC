import requests
import json

base_url = "https://toctoc.ky/wp-json/wp/v2"
username = "localadm"
password = "FLyX NfFc 4VLA cKtm skgr KXR3"

def check_pages():
    slugs = ["privacy-policy", "cookie-policy-uk", "terms-and-conditions", "terms-of-service"]
    for slug in slugs:
        response = requests.get(f"{base_url}/pages", auth=(username, password), params={'slug': slug})
        if response.status_code == 200:
            pages = response.json()
            if pages:
                page = pages[0]
                print(f"Slug: {slug}, ID: {page['id']}, Title: {page['title']['rendered']}, Template: {page['template']}")
            else:
                print(f"Slug: {slug} NOT FOUND")
        else:
            print(f"Error for {slug}: {response.status_code}")

if __name__ == "__main__":
    check_pages()
