import requests
import json
import time

base_url = "https://toctoc.ky/wp-json/wp/v2"
username = "localadm"
password = "FLyX NfFc 4VLA cKtm skgr KXR3"

def update_page(page_id, data):
    response = requests.post(f"{base_url}/pages/{page_id}", auth=(username, password), json=data)
    if response.status_code == 200:
        print(f"Updated page {page_id} successfully.")
    else:
        print(f"Error updating page {page_id}: {response.status_code}, {response.text}")

def create_page(data):
    response = requests.post(f"{base_url}/pages", auth=(username, password), json=data)
    if response.status_code == 201:
        page = response.json()
        print(f"Created page '{data['title']}' successfully. ID: {page['id']}")
        return page['id']
    else:
        print(f"Error creating page '{data['title']}': {response.status_code}, {response.text}")
        return None

if __name__ == "__main__":
    # First pass: Update title/slug
    print("Updating titles and slugs...")
    update_page(3, {"title": "Privacy Policy", "slug": "privacy-policy"})
    update_page(2631, {"title": "Cookie Policy", "slug": "cookie-policy"})
    
    # Check if Terms exists
    response = requests.get(f"{base_url}/pages", auth=(username, password), params={'slug': 'terms-and-conditions'})
    if response.status_code == 200 and not response.json():
        print("Creating Terms and Conditions...")
        terms_content = "<h2>Terms and Conditions</h2><p>Coming soon...</p>"
        create_page({"title": "Terms and Conditions", "slug": "terms-and-conditions", "content": terms_content, "status": "publish"})
    
    # Wait a bit for template recognition (optional but might help if WP cron/scan runs)
    print("Waiting 5 seconds...")
    time.sleep(5)
    
    # Second pass: Update templates
    print("Updating templates...")
    update_page(3, {"template": "page-legal.php"})
    update_page(2631, {"template": "page-legal.php"})
    
    # Get ID of Terms and Conditions
    response = requests.get(f"{base_url}/pages", auth=(username, password), params={'slug': 'terms-and-conditions'})
    if response.status_code == 200:
        pages = response.json()
        if pages:
            update_page(pages[0]['id'], {"template": "page-legal.php"})
