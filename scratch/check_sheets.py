import os
from google.oauth2 import service_account
from googleapiclient.discovery import build

CRED_PATH = 'service_account_credentials.json'
SPREADSHEET_ID = '1BwlKhZvGz23tpdg7_42UsN4M1Leun1Oju7wAdbAWsy8'

def get_sheet_titles():
    try:
        creds = service_account.Credentials.from_service_account_file(CRED_PATH, scopes=['https://www.googleapis.com/auth/spreadsheets'])
        service = build('sheets', 'v4', credentials=creds)
        spreadsheet = service.spreadsheets().get(spreadsheetId=SPREADSHEET_ID).execute()
        titles = [sheet['properties']['title'] for sheet in spreadsheet['sheets']]
        print(f"Pestañas encontradas: {titles}")
    except Exception as e:
        print(f"Error: {str(e)}")

if __name__ == "__main__":
    get_sheet_titles()
