var KvkButtonParams = { "price":   ".product-price", "title":   ".product-title", "button":  ".btn.btn-default", "sig":     "7120462368c65b79de85575c39adc333", "partner": "a06m0000005F0QzAAK", "type":    "full", "url":     "localhost", "sdkUrl":     "https://form-test.kupivkredit.ru/sdk/v1/sdk.js", "buttonStyle":     "undefined", "getParent": function(item) { return item.parentNode.parentNode ;}, "priceFormatter": function(price) { return price.replace(/[^0-9]/g, '')} };
(function (params, document) {
    var realUrl, kvkButton, buttonStyle, priceFormatter, getParent, getPrice, getTitle, title, price;

    realUrl = window.location.hostname;
    if (realUrl != params.url) {
        return;
    }

    buttonStyle = params.buttonStyle || "margin: 5px 0 5px 0; width: 150px; display: block;";

    priceFormatter = params.priceFormatter || function(price) {
            return price.replace(/[^0-9.,]/g, '').replace(/,/g, '.');
        };

    getParent = params.getParent || function(item) {
            return item.parentNode;
        };

    getPrice = function(item) {
        return priceFormatter(item.querySelector(params.price).innerText);
    };

    getTitle = function(item) {
        return item.querySelector(params.title).innerText;
    };

    document.querySelectorAll(params.button).forEach(function (item) {
        if (getPrice(getParent(item))>3000) {
            item.parentNode.appendChild(createButton());
        }
    });

    function createButton() {
        kvkButton = document.createElement('a');
        kvkButton.className = "kupivkredit-button";
        kvkButton.href = "#";
        var imageKvkButton = document.createElement('img');
        imageKvkButton.src = "https://www.kupivkredit.ru/images/insales/btn.png";
        imageKvkButton.style= buttonStyle;
        kvkButton.appendChild(imageKvkButton);
        kvkButton.onclick = openForm;
        return kvkButton;
    }

    function openForm(e) {
        var parent, loadSDK;
        e.preventDefault();

        loadSDK = function(path, fnName) {
            var scriptElement = document.createElement("script");
            scriptElement.src = path + "?onload=" + fnName;
            document.getElementsByTagName('body')[0].appendChild(scriptElement);
        };

        parent = getParent(e.currentTarget);
        title = getTitle(parent);
        price = getPrice(parent);
        console.log(title, price);

        if (!window.KVK) {
            loadSDK(params.sdkUrl, "OpenKvkForm");
        }
        else {
            window.OpenKvkForm(window.KVK);
        }
    }

    window.OpenKvkForm = function (KVK) {
        var order, json, form, b64EncodeUnicode;

        b64EncodeUnicode = function(str) {
            return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
                return String.fromCharCode('0x' + p1);
            }));
        };

        order = {
            partnerId: params.partner,
            partnerOrderId: Date.now(),
            items: [
                {
                    title: title,
                    category: "",
                    qty: 1,
                    price: price
                }
            ],
            discount: 0
        };

        json = JSON.stringify(order);
        form = KVK.ui("form", {order: b64EncodeUnicode(json), sign: params.sig, type: params.type});
        form.open();
    };

})(KvkButtonParams, document);