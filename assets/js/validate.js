/*
 * validate.js 1.4.1
 * Copyright (c) 2011 - 2014 Rick Harrison, http://rickharrison.me
 * validate.js is open sourced under the MIT license.
 * Portions of validate.js are inspired by CodeIgniter.
 * http://rickharrison.github.com/validate.js
 */
(function(q, r, m) {
    var s = {
            required: "%s harus diisi.",
            matches: "%s tidak sesuai dengan %s.",
            "default": "%s tidak berubah, harap diganti.",
            valid_email: "%s harus berisi alamat email valid.",
            valid_emails: "%s harus berisi alamat-alamat email valid.",
            min_length: "%s minimal terdiri dari %s karakter.",
            max_length: "%s maksimal terdiri dari %s karakter.",
            exact_length: "%s field must be exactly %s characters in length.",
            greater_than: "%s harus lebih besar dari %s.",
            less_than: "%s harus lebih kecil dari %s.",
            alpha: "%s hanya terdiri dari huruf alfabet.",
            alpha_numeric: "%s hanya terdiri dari angka.",
            alpha_dash: "%s hanya terdiri dari angka, garis bawah, and garis hubung.",
            numeric: "%s harus berisi angka.",
            integer: "%s harus berisi integer.",
            decimal: "%s harus berisi bilangan desimal.",
            is_natural: "%s harus berisi bilangan positif.",
            is_natural_no_zero: "%s harus berisi bilangan lebih besar dari nol.",
            valid_ip: "%s harus berisi alamat IP valid.",
            valid_base64: "%s harus berisi string basis 64.",
            valid_credit_card: "%s harus berisi nomor kartu kredit valid.",
            is_file_type: "%s hanya bertipe file %s.",
            valid_url: "%s harus berisi URL Valid."
            // required: "The %s field is required.",
            // matches: "The %s field does not match the %s field.",
            // "default": "The %s field is still set to default, please change.",
            // valid_email: "The %s field must contain a valid email address.",
            // valid_emails: "The %s field must contain all valid email addresses.",
            // min_length: "The %s field must be at least %s characters in length.",
            // max_length: "The %s field must not exceed %s characters in length.",
            // exact_length: "The %s field must be exactly %s characters in length.",
            // greater_than: "The %s field must contain a number greater than %s.",
            // less_than: "The %s field must contain a number less than %s.",
            // alpha: "The %s field must only contain alphabetical characters.",
            // alpha_numeric: "The %s field must only contain alpha-numeric characters.",
            // alpha_dash: "The %s field must only contain alpha-numeric characters, underscores, and dashes.",
            // numeric: "The %s field must contain only numbers.",
            // integer: "The %s field must contain an integer.",
            // decimal: "The %s field must contain a decimal number.",
            // is_natural: "The %s field must contain only positive numbers.",
            // is_natural_no_zero: "The %s field must contain a number greater than zero.",
            // valid_ip: "The %s field must contain a valid IP.",
            // valid_base64: "The %s field must contain a base64 string.",
            // valid_credit_card: "The %s field must contain a valid credit card number.",
            // is_file_type: "The %s field must contain only %s files.",
            // valid_url: "The %s field must contain a valid URL."
        },
        t = function(a) {},
        u = /^(.+?)\[(.+)\]$/,
        h = /^[0-9]+$/,
        v = /^\-?[0-9]+$/,
        k = /^\-?[0-9]*\.?[0-9]+$/,
        p = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        w = /^[a-z]+$/i,
        x = /^[a-z0-9]+$/i,
        y = /^[a-z0-9_\-]+$/i,
        z = /^[0-9]+$/i,
        A = /^[1-9][0-9]*$/i,
        B = /^((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){3}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})$/i,
        C = /[^a-zA-Z0-9\/\+=]/i,
        D = /^[\d\-\s]+$/,
        E = /^((http|https):\/\/(\w+:{0,1}\w*@)?(\S+)|)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/,
        f = function(a, b, c) {
            this.callback = c || t;
            this.errors = [];
            this.fields = {};
            this.form = this._formByNameOrNode(a) || {};
            this.messages = {};
            this.handlers = {};
            this.conditionals = {};
            a = 0;
            for (c = b.length; a < c; a++) {
                var d = b[a];
                if ((d.name || d.names) && d.rules)
                    if (d.names)
                        for (var g = 0, f = d.names.length; g < f; g++) this._addField(d, d.names[g]);
                    else this._addField(d, d.name)
            }
            var e = this.form.onsubmit;
            this.form.onsubmit = function(a) {
                return function(b) {
                    try {
                        return a._validateForm(b) && (e === m || e())
                    } catch (c) {}
                }
            }(this)
        },
        n = function(a, b) {
            var c;
            if (0 < a.length && ("radio" === a[0].type || "checkbox" === a[0].type))
                for (c =
                    0, elementLength = a.length; c < elementLength; c++) {
                    if (a[c].checked) return a[c][b]
                } else return a[b]
        };
    f.prototype.setMessage = function(a, b) {
        this.messages[a] = b;
        return this
    };
    f.prototype.registerCallback = function(a, b) {
        a && "string" === typeof a && b && "function" === typeof b && (this.handlers[a] = b);
        return this
    };
    f.prototype.registerConditional = function(a, b) {
        a && "string" === typeof a && b && "function" === typeof b && (this.conditionals[a] = b);
        return this
    };
    f.prototype._formByNameOrNode = function(a) {
        return "object" === typeof a ? a : r.forms[a]
    };
    f.prototype._addField = function(a, b) {
        this.fields[b] = {
            name: b,
            display: a.display || b,
            rules: a.rules,
            depends: a.depends,
            id: null,
            element: null,
            type: null,
            value: null,
            checked: null
        }
    };
    f.prototype._validateForm = function(a) {
        this.errors = [];
        for (var b in this.fields)
            if (this.fields.hasOwnProperty(b)) {
                var c = this.fields[b] || {},
                    d = this.form[c.name];
                d && d !== m && (c.id = n(d, "id"), c.element = d, c.type = 0 < d.length ? d[0].type : d.type, c.value = n(d, "value"), c.checked = n(d, "checked"), c.depends && "function" === typeof c.depends ? c.depends.call(this,
                    c) && this._validateField(c) : c.depends && "string" === typeof c.depends && this.conditionals[c.depends] ? this.conditionals[c.depends].call(this, c) && this._validateField(c) : this._validateField(c))
            }
            "function" === typeof this.callback && this.callback(this.errors, a);
        0 < this.errors.length && (a && a.preventDefault ? a.preventDefault() : event && (event.returnValue = !1));
        return !0
    };
    f.prototype._validateField = function(a) {
        for (var b = a.rules.split("|"), c = a.rules.indexOf("required"), d = !a.value || "" === a.value || a.value === m, g = 0, f = b.length; g <
            f; g++) {
            var e = b[g],
                l = null,
                h = !1,
                k = u.exec(e);
            if (-1 !== c || -1 !== e.indexOf("!callback_") || !d)
                if (k && (e = k[1], l = k[2]), "!" === e.charAt(0) && (e = e.substring(1, e.length)), "function" === typeof this._hooks[e] ? this._hooks[e].apply(this, [a, l]) || (h = !0) : "callback_" === e.substring(0, 9) && (e = e.substring(9, e.length), "function" === typeof this.handlers[e] && !1 === this.handlers[e].apply(this, [a.value, l, a]) && (h = !0)), h) {
                    b = this.messages[a.name + "." + e] || this.messages[e] || s[e];
                    c = "An error has occurred with the " + a.display + " field.";
                    b &&
                        (c = b.replace("%s", a.display), l && (c = c.replace("%s", this.fields[l] ? this.fields[l].display : l)));
                    this.errors.push({
                        id: a.id,
                        element: a.element,
                        name: a.name,
                        message: c,
                        rule: e
                    });
                    break
                }
        }
    };
    f.prototype._hooks = {
        required: function(a) {
            var b = a.value;
            return "checkbox" === a.type || "radio" === a.type ? !0 === a.checked : null !== b && "" !== b
        },
        "default": function(a, b) {
            return a.value !== b
        },
        matches: function(a, b) {
            var c = this.form[b];
            return c ? a.value === c.value : !1
        },
        valid_email: function(a) {
            return p.test(a.value)
        },
        valid_emails: function(a) {
            a = a.value.split(",");
            for (var b = 0, c = a.length; b < c; b++)
                if (!p.test(a[b])) return !1;
            return !0
        },
        min_length: function(a, b) {
            return h.test(b) ? a.value.length >= parseInt(b, 10) : !1
        },
        max_length: function(a, b) {
            return h.test(b) ? a.value.length <= parseInt(b, 10) : !1
        },
        exact_length: function(a, b) {
            return h.test(b) ? a.value.length === parseInt(b, 10) : !1
        },
        greater_than: function(a, b) {
            return k.test(a.value) ? parseFloat(a.value) > parseFloat(b) : !1
        },
        less_than: function(a, b) {
            return k.test(a.value) ? parseFloat(a.value) < parseFloat(b) : !1
        },
        alpha: function(a) {
            return w.test(a.value)
        },
        alpha_numeric: function(a) {
            return x.test(a.value)
        },
        alpha_dash: function(a) {
            return y.test(a.value)
        },
        numeric: function(a) {
            return h.test(a.value)
        },
        integer: function(a) {
            return v.test(a.value)
        },
        decimal: function(a) {
            return k.test(a.value)
        },
        is_natural: function(a) {
            return z.test(a.value)
        },
        is_natural_no_zero: function(a) {
            return A.test(a.value)
        },
        valid_ip: function(a) {
            return B.test(a.value)
        },
        valid_base64: function(a) {
            return C.test(a.value)
        },
        valid_url: function(a) {
            return E.test(a.value)
        },
        valid_credit_card: function(a) {
            if (!D.test(a.value)) return !1;
            var b = 0,
                c = 0,
                d = !1;
            a = a.value.replace(/\D/g, "");
            for (var g = a.length - 1; 0 <= g; g--) c = a.charAt(g), c = parseInt(c, 10), d && 9 < (c *= 2) && (c -= 9), b += c, d = !d;
            return 0 === b % 10
        },
        is_file_type: function(a, b) {
            if ("file" !== a.type) return !0;
            var c = a.value.substr(a.value.lastIndexOf(".") + 1),
                d = b.split(","),
                g = !1,
                f = 0,
                e = d.length;
            for (f; f < e; f++) c == d[f] && (g = !0);
            return g
        }
    };
    q.FormValidator = f
})(window, document);
