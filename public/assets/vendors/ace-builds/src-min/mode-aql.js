define("ace/mode/aql_highlight_rules", ["require", "exports", "module", "ace/lib/oop", "ace/mode/text_highlight_rules"], function (e, t, n) {
    "use strict";
    var r = e("../lib/oop"), i = e("./text_highlight_rules").TextHighlightRules, s = function () {
        var e = "for|search|outbound|inbound|any|graph|prune|options|shortest_path|to|in|return|filter|sort|limit|let|collect|remove|update|replace|insers|upsert|with",
            t = "true|false",
            n = "append|contains_array|count|count_distinct|count_unique|first|flatten|intersection|last|length|minus|nth|outersection|pop|position|push|remove_nth|remove_value|remove_values|reverse|shift|slice|sorted|sorted_unique|union|union_distinct|unique|unshift|date_now|date_iso8601|date_timestamp|is_datestring|date_dayofweek|date_year|date_month|date_day|date_hour|date_minute|date_second|date_millisecond|date_dayofyear|date_isoweek|date_leapyear|date_quarter|date_days_in_month|date_trunc|date_format|date_add|date_subtract|date_diff|date_compare|attributes|count|has|is_same_collection|keep|length|matches|merge|merge_recursive|parse_identifier|translate|unset|unset_recursive|values|zip|fulltext|distance|geo_contains|geo_distance|geo_equals|geo_intersects|is_in_polygon|not_null|first_list|first_document|check_document|collection_count|collections|count|current_user|document|length|hash|apply|assert|/ warn|call|fail|noopt|passthru|sleep|v8|version|abs|acos|asin|atan|atan2|average|avg|ceil|cos|degrees|exp|exp2|floor|log|log2|log10|max|median|min|percentile|pi|pow|radians|rand|range|round|sin|sqrt|stddev_population|stddev_sample|stddev|sum|tan|variance_population|variance_sample|variance|char_length|concat|concat_separator|contains|count|encode_uri_component|find_first|find_last|json_parse|json_stringify|left|length|levenshtein_distance|like|lower|ltrim|md5|random_token|regex_matches|regex_split|regex_test|regex_replace|reverse|right|rtrim|sha1|sha512|split|soundex|substitute|substring|tokens|to_base64|to_hex|trim|upper|uuid|to_bool|to_number|to_string|to_array|to_list|is_null|is_bool|is_number|is_string|is_array|is_list|is_object|is_document|is_datestring|is_key|typename|",
            r = this.createKeywordMapper({"support.function": n, keyword: e, "constant.language": t}, "identifier", !0);
        this.$rules = {
            start: [{token: "comment", regex: "//.*$"}, {token: "string", regex: '".*?"'}, {
                token: "string",
                regex: "'.*?'"
            }, {token: "constant.numeric", regex: "[+-]?\\d+(?:(?:\\.\\d*)?(?:[eE][+-]?\\d+)?)?\\b"}, {
                token: r,
                regex: "[a-zA-Z_$][a-zA-Z0-9_$]*\\b"
            }, {
                token: "keyword.operator",
                regex: "\\+|\\-|\\/|\\/\\/|%|<@>|@>|<@|&|\\^|~|<|>|<=|=>|==|!=|<>|="
            }, {token: "paren.lparen", regex: "[\\(]"}, {token: "paren.rparen", regex: "[\\)]"}, {
                token: "text",
                regex: "\\s+"
            }]
        }, this.normalizeRules()
    };
    r.inherits(s, i), t.AqlHighlightRules = s
}), define("ace/mode/aql", ["require", "exports", "module", "ace/lib/oop", "ace/mode/text", "ace/mode/aql_highlight_rules"], function (e, t, n) {
    "use strict";
    var r = e("../lib/oop"), i = e("./text").Mode, s = e("./aql_highlight_rules").AqlHighlightRules, o = function () {
        this.HighlightRules = s, this.$behaviour = this.$defaultBehaviour
    };
    r.inherits(o, i), function () {
        this.lineCommentStart = "//", this.$id = "ace/mode/aql"
    }.call(o.prototype), t.Mode = o
});
(function () {
    window.require(["ace/mode/aql"], function (m) {
        if (typeof module == "object" && typeof exports == "object" && module) {
            module.exports = m;
        }
    });
})();
