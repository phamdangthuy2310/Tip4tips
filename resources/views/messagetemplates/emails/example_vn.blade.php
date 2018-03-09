<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */
        .template_email img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; }
        body.template_email {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; }
        .template_email table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
        .template_email table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top; }
        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
        .template_email .body {
            background-color: #f6f6f6;
            width: 100%; }
        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .template_email .container {
            display: block;
            Margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px; }
        /* This should also be a block element, so that it will fill 100% of the .container */
        .template_email .email_content {
            box-sizing: border-box;
            display: block;
            Margin: 0 auto;
            max-width: 580px;
            padding: 10px; }
        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .template_email .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%; }
        .template_email .email_wrapper {
            box-sizing: border-box;
            padding: 20px; }
        .template_email .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }
        .template_email .footer {
            clear: both;
            Margin-top: 10px;
            text-align: center;
            width: 100%; }
        .template_email .footer td,
        .template_email .footer p,
        .template_email .footer span,
        .template_email .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center; }
        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        .template_email h1,
        .template_email h2,
        .template_email h3,
        .template_email h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            Margin-bottom: 30px; }
        .template_email h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; }
        .template_email p,
        .template_email ul,
        .template_email ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            Margin-bottom: 15px; }
        .template_email p li,
        .template_email ul li,
        .template_email ol li {
            list-style-position: inside;
            margin-left: 5px; }
        .template_email a {
            color: #3498db;
            text-decoration: underline; }

        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .template_email .last {
            margin-bottom: 0; }
        .template_email .first {
            margin-top: 0; }
        .template_email .align-center {
            text-align: center; }
        .template_email .align-right {
            text-align: right; }
        .template_email .align-left {
            text-align: left; }
        .template_email .clear {
            clear: both; }
        .template_email .mt0 {
            margin-top: 0; }
        .template_email .mb0 {
            margin-bottom: 0; }
        .template_email .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; }
        .template_email .powered-by a {
            text-decoration: none; }
        .template_email hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            Margin: 20px 0; }
        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
            .template_email table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important; }
            .template_email table[class=body] p,
            .template_email table[class=body] ul,
            .template_email table[class=body] ol,
            .template_email table[class=body] td,
            .template_email table[class=body] span,
            .template_email table[class=body] a {
                font-size: 16px !important; }
            .template_email table[class=body] .email_wrapper,
            .template_email table[class=body] .article {
                padding: 10px !important; }
            .template_email table[class=body] .content {
                padding: 0 !important; }
            .template_email table[class=body] .container {
                padding: 0 !important;
                width: 100% !important; }
            .template_email table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important; }
            .template_email table[class=body] .btn table {
                width: 100% !important; }
            .template_email table[class=body] .btn a {
                width: 100% !important; }
            .template_email table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important; }}
        /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%; }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%; }
            .template_email .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important; }
            .template_email .btn-primary table td:hover {
                background-color: #34495e !important; }
            .template_email .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important; } }
    </style>
</head>
<body class="">
<div class="template_email">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="email_content">

                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
                    <table class="main">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="email_wrapper">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            {!! html_entity_decode($template->content_vn) !!}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- END MAIN CONTENT AREA -->
                    </table>

                    <!-- START FOOTER -->
                    <div class="footer">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-block">
                                    <span class="apple-link">Tip4tips Company Inc</span>
                                    <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>.
                                </td>
                            </tr>
                            <tr>
                                <td class="content-block powered-by">
                                    Powered by <a href="">Tip4tips</a>.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- END FOOTER -->

                    <!-- END CENTERED WHITE CONTAINER -->
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>
</body>
</html>