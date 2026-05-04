import os
import json
from google.oauth2 import service_account
from google.analytics.admin_v1alpha import AnalyticsAdminServiceClient

CRED_PATH = 'service_account_credentials.json'

def list_ga4_properties():
    try:
        creds = service_account.Credentials.from_service_account_file(CRED_PATH)
        client = AnalyticsAdminServiceClient(credentials=creds)
        
        # List account summaries
        print("Buscando propiedades de GA4 accesibles...")
        results = client.list_account_summaries()
        
        for account in results:
            print(f"\nCuenta: {account.display_name} ({account.name})")
            for prop in account.property_summaries:
                print(f"  - Propiedad: {prop.display_name}")
                print(f"    ID: {prop.property.split('/')[-1]}")
                print(f"    Resource Name: {prop.property}")
                
    except Exception as e:
        print(f"Error: {str(e)}")

if __name__ == "__main__":
    list_ga4_properties()
