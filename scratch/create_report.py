import os
import json
from google.oauth2 import service_account
from googleapiclient.discovery import build

CRED_PATH = 'service_account_credentials.json'
SPREADSHEET_ID = '1BwlKhZvGz23tpdg7_42UsN4M1Leun1Oju7wAdbAWsy8'
TAB_NAME = 'TOCTOC'

def update_spreadsheet():
    try:
        creds = service_account.Credentials.from_service_account_file(
            CRED_PATH, 
            scopes=['https://www.googleapis.com/auth/spreadsheets']
        )
        service = build('sheets', 'v4', credentials=creds)
        
        # 1. Check if tab exists, create if not
        spreadsheet = service.spreadsheets().get(spreadsheetId=SPREADSHEET_ID).execute()
        sheet_id = None
        for sheet in spreadsheet['sheets']:
            if sheet['properties']['title'] == TAB_NAME:
                sheet_id = sheet['properties']['sheetId']
                break
        
        if sheet_id is None:
            add_sheet_request = {
                "addSheet": {
                    "properties": {
                        "title": TAB_NAME
                    }
                }
            }
            res = service.spreadsheets().batchUpdate(
                spreadsheetId=SPREADSHEET_ID,
                body={'requests': [add_sheet_request]}
            ).execute()
            sheet_id = res['replies'][0]['addSheet']['properties']['sheetId']
            print(f"Pestaña '{TAB_NAME}' creada.")

        # 2. Define the data
        data = [
            ["REPORTE ESTRATÉGICO SEO - TOCTOC MARKETING"],
            ["Fecha de Reporte:", "2026-05-04"],
            [""],
            ["1. MEJORAS TÉCNICAS E IMPLEMENTACIÓN IA"],
            ["Táctica", "Impacto / Descripción"],
            ["SEO Metadata & Technical Fixes", "Optimized header titles/descriptions for AEO. Added robots meta tag."],
            ["JSON-LD Schema (AEO)", "Implemented FAQPage, BreadcrumbList, and LocalBusiness schemas."],
            ["AI Bot Accessibility", "Created robots.txt with explicit 'Allow' for GPTBot, Claude, and Google-Extended."],
            ["Sitemap & Indexing", "Created sitemap.xml and submitted via robots.txt for faster discovery."],
            [""],
            ["2. TRÁFICO GENERADO POR IA (AI SEARCH)"],
            ["Plataforma de IA", "Sesiones (Últ. 30 días)"],
            ["ChatGPT", "1"],
            ["Bing (Copilot)", "1"],
            [""],
            ["3. RENDIMIENTO GOOGLE SEARCH CONSOLE"],
            ["Búsqueda (Keyword)", "Clicks", "Impresiones", "Posición Media"],
            ["cayman website design", "0", "15", "5.3"],
            ["cayman website design company", "0", "16", "8.0"],
            ["cayman web design", "0", "14", "8.9"],
            ["communications agency cayman", "0", "16", "13.6"],
            [""],
            ["4. ADQUISICIÓN DE CLIENTES POR CANAL"],
            ["Canal", "Sesiones Totales"],
            ["Organic Search", "48"],
            ["Direct", "36"],
            ["Social", "6"]
        ]
        
        body = {
            'values': data
        }
        
        # 3. Clear and Update values
        service.spreadsheets().values().clear(
            spreadsheetId=SPREADSHEET_ID,
            range=f"{TAB_NAME}!A1:Z100"
        ).execute()
        
        service.spreadsheets().values().update(
            spreadsheetId=SPREADSHEET_ID,
            range=f"{TAB_NAME}!A1",
            valueInputOption="RAW",
            body=body
        ).execute()
        
        # 4. Apply formatting (Colors)
        requests = [
            # Main Header: Deep Blue Background, White Bold Text
            {
                "repeatCell": {
                    "range": {"sheetId": sheet_id, "startRowIndex": 0, "endRowIndex": 1, "startColumnIndex": 0, "endColumnIndex": 2},
                    "cell": {
                        "userEnteredFormat": {
                            "backgroundColor": {"red": 0.07, "green": 0.45, "blue": 0.8},
                            "textFormat": {"foregroundColor": {"red": 1.0, "green": 1.0, "blue": 1.0}, "bold": True, "fontSize": 12},
                            "horizontalAlignment": "CENTER"
                        }
                    },
                    "fields": "userEnteredFormat(backgroundColor,textFormat,horizontalAlignment)"
                }
            },
            # Section Headers: Light Gray Background, Bold Text
            {
                "repeatCell": {
                    "range": {"sheetId": sheet_id, "startRowIndex": 3, "endRowIndex": 5, "startColumnIndex": 0, "endColumnIndex": 2},
                    "cell": {
                        "userEnteredFormat": {
                            "backgroundColor": {"red": 0.95, "green": 0.95, "blue": 0.95},
                            "textFormat": {"bold": True}
                        }
                    },
                    "fields": "userEnteredFormat(backgroundColor,textFormat)"
                }
            },
            {
                "repeatCell": {
                    "range": {"sheetId": sheet_id, "startRowIndex": 10, "endRowIndex": 12, "startColumnIndex": 0, "endColumnIndex": 2},
                    "cell": {
                        "userEnteredFormat": {
                            "backgroundColor": {"red": 0.95, "green": 0.95, "blue": 0.95},
                            "textFormat": {"bold": True}
                        }
                    },
                    "fields": "userEnteredFormat(backgroundColor,textFormat)"
                }
            },
            {
                "repeatCell": {
                    "range": {"sheetId": sheet_id, "startRowIndex": 15, "endRowIndex": 17, "startColumnIndex": 0, "endColumnIndex": 4},
                    "cell": {
                        "userEnteredFormat": {
                            "backgroundColor": {"red": 0.95, "green": 0.95, "blue": 0.95},
                            "textFormat": {"bold": True}
                        }
                    },
                    "fields": "userEnteredFormat(backgroundColor,textFormat)"
                }
            },
            {
                "repeatCell": {
                    "range": {"sheetId": sheet_id, "startRowIndex": 22, "endRowIndex": 24, "startColumnIndex": 0, "endColumnIndex": 2},
                    "cell": {
                        "userEnteredFormat": {
                            "backgroundColor": {"red": 0.95, "green": 0.95, "blue": 0.95},
                            "textFormat": {"bold": True}
                        }
                    },
                    "fields": "userEnteredFormat(backgroundColor,textFormat)"
                }
            },
            # Alternating Row Colors for data rows (optional but looks good)
            {
                "repeatCell": {
                    "range": {"sheetId": sheet_id, "startRowIndex": 5, "endRowIndex": 9, "startColumnIndex": 0, "endColumnIndex": 2},
                    "cell": {
                        "userEnteredFormat": {
                            "backgroundColor": {"red": 0.98, "green": 0.98, "blue": 1.0}
                        }
                    },
                    "fields": "userEnteredFormat(backgroundColor)"
                }
            }
        ]
        
        service.spreadsheets().batchUpdate(
            spreadsheetId=SPREADSHEET_ID,
            body={'requests': requests}
        ).execute()
        
        print(f"Reporte generado con éxito en la pestaña '{TAB_NAME}'.")

    except Exception as e:
        print(f"Error: {str(e)}")

if __name__ == "__main__":
    update_spreadsheet()
