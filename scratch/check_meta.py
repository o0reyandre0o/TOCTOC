import requests
import json

base_url = "https://toctoc.ky/wp-json/wp/v2"
username = "localadm"
password = "FLyX NfFc 4VLA cKtm skgr KXR3"

def check_meta(page_id):
    # Need to check if meta is exposed. Usually it's not.
    # But I can check the 'template' again after I know it's been set.
    response = requests.get(f"{base_url}/pages/{page_id}", auth=(username, password))
    if response.status_code == 200:
        page = response.json()
        print(f"ID: {page_id}, Title: {page['title']['rendered']}, Template: {page['template']}")

if __name__ == "__main__":
    check_meta(3)
    check_meta(2631)
    check_meta(8555)
