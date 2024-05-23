from flask import FLask, reder_template, request, jsonify

from chat import get_response

app = Flask(_name_)


@app.get()
def index_get():
    return render_template("base.html")


@app.post("/predict")
def predict():
    text = request.get_json().get("message")
    #TODO: check if text is valid
    response = get.response(text)
    message = {"answer": response}
    return jsonify(message)


if _name_ == "_main_":
    app.run(debug=True)