import os
from google.oauth2 import service_account
from google.analytics.data_v1beta import BetaAnalyticsDataClient
from google.analytics.data_v1beta.types import (
    DateRange,
    Dimension,
    Metric,
    RunReportRequest,
)

CRED_PATH = 'service_account_credentials.json'
PROPERTY_ID = '523928253'

def get_toctoc_ga4_data():
    try:
        creds = service_account.Credentials.from_service_account_file(CRED_PATH)
        client = BetaAnalyticsDataClient(credentials=creds)
        
        request = RunReportRequest(
            property=f"properties/{PROPERTY_ID}",
            dimensions=[Dimension(name="sessionSource")],
            metrics=[Metric(name="activeUsers"), Metric(name="sessions")],
            date_ranges=[DateRange(start_date="30daysAgo", end_date="today")],
        )
        
        response = client.run_report(request)
        
        print(f"Resultados de GA4 para TocToc (Últimos 30 días):")
        for row in response.rows:
            print(f"Fuente: {row.dimension_values[0].value} | Usuarios: {row.metric_values[0].value} | Sesiones: {row.metric_values[1].value}")
            
    except Exception as e:
        print(f"Error: {str(e)}")

if __name__ == "__main__":
    get_toctoc_ga4_data()
