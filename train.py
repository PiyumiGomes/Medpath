import os
import pandas as pd
import numpy as np
import joblib
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score, classification_report

# Load preprocessed dataset
df = pd.read_csv(r"C:\Users\Shehara\HeartSheildAI\data\preprocessed_heart.csv")

# Convert target column to binary classification (0 or 1)
df["Diagnosis"] = df["Diagnosis"].apply(lambda x: 1 if x >= 0.5 else 0)

# Split into features (X) and target variable (y)
X = df.drop(columns=["Diagnosis"])  # Change this if your target column is different
y = df["Diagnosis"]

# Split data into training (80%) and testing (20%)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train Logistic Regression model
model = LogisticRegression()
model.fit(X_train, y_train)

# Predictions
y_pred = model.predict(X_test)

# Evaluate model
accuracy = accuracy_score(y_test, y_pred)
print(f"✅ Model Accuracy: {accuracy:.4f}")

# Detailed classification report
print("\n📌 Classification Report:")
print(classification_report(y_test, y_pred))

# Ensure the 'models' directory exists
models_dir = r"C:\Users\Shehara\HeartSheildAI\models"
if not os.path.exists(models_dir):
    os.makedirs(models_dir)

# Save the trained model
joblib.dump(model, os.path.join(models_dir, "heart_disease_model.pkl"))
print("\n✅ Model training complete! Model saved as 'heart_disease_model.pkl'")
