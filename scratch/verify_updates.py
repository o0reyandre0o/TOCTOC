import requests
import json

base_url = "https://toctoc.ky/wp-json/wp/v2"
username = "localadm"
password = "FLyX NfFc 4VLA nKtm skgr KXR3"

def check_pages():
    ids = [3, 2631]
    for page_id in ids:
        response = requests.get(f"{base_url}/pages/{page_id}", auth=(username, password))
        if response.status_code == 200:
            page = response.json()
            print(f"ID: {page_id}, Title: {page['title']['rendered']}, Slug: {page['slug']}, Template: {page['template']}")
        else:
            print(f"Error for {page_id}: {response.status_code}")

if __name__ == "__main__":
    check_pages()
