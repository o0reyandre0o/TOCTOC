import os
import json
from datetime import datetime, timedelta
from google.oauth2 import service_account
from googleapiclient.discovery import build

SCOPES = ['https://www.googleapis.com/auth/webmasters']
CRED_PATH = 'service_account_credentials.json'
SITE_URL = 'https://toctoc.ky/'

try:
    creds = service_account.Credentials.from_service_account_file(CRED_PATH, scopes=SCOPES)
    service = build('searchconsole', 'v1', credentials=creds)
    
    # Configuración de fechas: Semana anterior (Lunes a Viernes)
    today = datetime.now().date()
    start_date = today - timedelta(days=today.weekday() + 7)
    end_date = start_date + timedelta(days=4)
    
    print(f"Buscando datos de Toc Toc Marketing desde {start_date} hasta {end_date}...")
    
    request = {
        'startDate': start_date.strftime('%Y-%m-%d'),
        'endDate': end_date.strftime('%Y-%m-%d'),
        'dimensions': ['query'],
        'rowLimit': 25
    }
    
    response = service.searchanalytics().query(siteUrl=SITE_URL, body=request).execute()
    print(json.dumps(response, indent=2))
except Exception as e:
    print(f"Error: {str(e)}")
