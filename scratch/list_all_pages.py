import requests
import json

base_url = "https://toctoc.ky/wp-json/wp/v2"
username = "localadm"
password = "FLyX NfFc 4VLA cKtm skgr KXR3"

def get_all_pages():
    params = {'per_page': 100}
    response = requests.get(f"{base_url}/pages", auth=(username, password), params=params)
    if response.status_code == 200:
        pages = response.json()
        for page in pages:
            print(f"ID: {page['id']}, Title: {page['title']['rendered']}, Slug: {page['slug']}")
    else:
        print(f"Error: {response.status_code}, {response.text}")

if __name__ == "__main__":
    get_all_pages()
