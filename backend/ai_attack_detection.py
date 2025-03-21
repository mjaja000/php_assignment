#!/usr/bin/env python3
import sys

def detect_attack(log_data):
    # Dummy logic: if "failed" occurs more than 5 times, return an alert.
    if log_data.count("failed") > 5:
        return "Alert: Potential brute force attack detected."
    return "No anomalies detected."

# For demonstration, using a sample log string.
sample_log = "failed failed failed failed failed failed"
result = detect_attack(sample_log)
print(result)
