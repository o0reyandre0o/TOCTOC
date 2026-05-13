import requests
import json

base_url = "https://toctoc.ky/wp-json/wp/v2"
username = "localadm"
password = "FLyX NfFc 4VLA cKtm skgr KXR3"

def update_content(page_id, content):
    response = requests.post(f"{base_url}/pages/{page_id}", auth=(username, password), json={"content": content})
    if response.status_code == 200:
        print(f"Updated content for page {page_id}")
    else:
        print(f"Error: {response.status_code}, {response.text}")

if __name__ == "__main__":
    terms_html = """
    <h2>Terms and Conditions</h2>
    <p>Last updated: May 2026</p>
    <p>Please read these terms and conditions carefully before using our services.</p>
    <h3>1. Agreement to Terms</h3>
    <p>By using TocToc Marketing's services, you agree to be bound by these Terms.</p>
    <h3>2. Privacy Policy</h3>
    <p>Your use of our services is also governed by our Privacy Policy.</p>
    <h3>3. Contact Us</h3>
    <p>If you have any questions, contact us at info@toctoc.ky.</p>
    """
    update_content(8555, terms_html)
