import os
from google.oauth2 import service_account
from googleapiclient.discovery import build

CRED_PATH = 'service_account_credentials.json'

try:
    creds = service_account.Credentials.from_service_account_file(CRED_PATH, scopes=['https://www.googleapis.com/auth/webmasters.readonly'])
    service = build('searchconsole', 'v1', credentials=creds)
    
    sites = service.sites().list().execute()
    print("Sitios accesibles en GSC:")
    if 'siteEntry' in sites:
        for site in sites['siteEntry']:
            print(f"- {site['siteUrl']} (Permission: {site['permissionLevel']})")
    else:
        print("No se encontraron sitios.")
except Exception as e:
    print(f"Error: {str(e)}")
