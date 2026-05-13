import requests
import json

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
    # 1. Update Privacy Policy
    update_page(3, {
        "template": "page-legal.php",
        "title": "Privacy Policy"
    })

    # 2. Update Cookie Policy (and rename slug)
    update_page(2631, {
        "template": "page-legal.php",
        "title": "Cookie Policy",
        "slug": "cookie-policy"
    })

    # 3. Create Terms and Conditions
    terms_content = """
    <h2>1. Introduction</h2>
    <p>Welcome to TocToc Marketing. By accessing our website, you agree to these terms and conditions.</p>
    <h2>2. Intellectual Property</h2>
    <p>All content on this site is the property of TocToc Marketing.</p>
    <h2>3. Limitation of Liability</h2>
    <p>We are not liable for any damages arising from the use of our services.</p>
    """
    create_page({
        "title": "Terms and Conditions",
        "slug": "terms-and-conditions",
        "content": terms_content,
        "status": "publish",
        "template": "page-legal.php"
    })
