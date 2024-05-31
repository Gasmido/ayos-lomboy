from flask import Flask, request, jsonify
import numpy as np

app = Flask(__name__)

# Load your trained model
model = tf.keras.models.load_model('/model.py')

@app.route('/chat', methods=['POST'])
def chat():
    data = request.json
    user_message = data.get('message')

    # Preprocess user message and generate a response
    # For example purposes, we'll just return a static response
    # In practice, use your model to generate a response
    response = "This is a static response. Replace with model inference."

    return jsonify({'response': response})

if __name__ == '__main__':
    app.run(port=5000)
