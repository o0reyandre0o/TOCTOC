import requests
import json

base_url = "https://toctoc.ky/wp-json/wp/v2"
username = "localadm"
password = "FLyX NfFc 4VLA cKtm skgr KXR3"

def update_terms():
    content = """
    <h2>1. Introduction</h2>
    <p>Welcome to TocToc Marketing ("Company", "we", "our", "us"). These Terms and Conditions govern your use of our website and services in the Cayman Islands.</p>
    
    <h2>2. Services</h2>
    <p>We provide digital marketing services, including SEO, AEO, Web Design, and Social Media Management. Specific deliverables and timelines will be outlined in separate service agreements or project proposals.</p>
    
    <h2>3. Intellectual Property</h2>
    <p>Unless otherwise stated, TocToc Marketing and/or its licensors own the intellectual property rights for all material on this website. All intellectual property rights are reserved. You may access this from TocToc Marketing for your own personal use subjected to restrictions set in these terms and conditions.</p>
    
    <h2>4. User Responsibilities</h2>
    <p>By using our services, you agree to provide accurate information and to use our platform in compliance with all applicable local laws in the Cayman Islands.</p>
    
    <h2>5. Limitation of Liability</h2>
    <p>In no event shall TocToc Marketing, nor any of its officers, directors, and employees, be held liable for anything arising out of or in any way connected with your use of this website whether such liability is under contract. TocToc Marketing, including its officers, directors, and employees shall not be held liable for any indirect, consequential, or special liability arising out of or in any way related to your use of this website.</p>
    
    <h2>6. Governing Law</h2>
    <p>These Terms will be governed by and interpreted in accordance with the laws of the Cayman Islands, and you submit to the non-exclusive jurisdiction of the state and federal courts located in the Cayman Islands for the resolution of any disputes.</p>
    
    <h2>7. Contact Information</h2>
    <p>If you have any questions about these Terms, please contact us at <a href="mailto:info@toctoc.ky">info@toctoc.ky</a>.</p>
    """
    
    # ID was 8555 from previous output
    response = requests.post(f"{base_url}/pages/8555", auth=(username, password), json={"content": content})
    if response.status_code == 200:
        print("Terms and Conditions updated successfully.")
    else:
        print(f"Error: {response.status_code}, {response.text}")

if __name__ == "__main__":
    update_terms()
