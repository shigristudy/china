<html>

<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{__('words.email.contact.admin_title')}}</title>
</head>

<body bgcolor="#f6f6f6" style="width: 100% !important; height: 100%; font-family: Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
<table style="width: 100%; padding: 20px;">
    <tr>
        <td></td>
        <td bgcolor="#fff" style="display: block !important; max-width: 600px !important; clear: both !important; color: #8c949e; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">
            <div style="max-width: 600px; display: block; margin: 0 auto;">
                <table style="width: 100%;">
                    <tr>
                        <td style="border-bottom-width: 1px; border-bottom-color: #f0f0f0; border-bottom-style: solid;">
                            <h2 style="font-family: Arial, sans-serif; color: #63676d; line-height: 1.2; font-weight: 200; text-align: center; font-size: 28px; margin: 18px 0;" align="center">
                                {{__('words.email.contact.admin_head')}}
                            </h2>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="max-width: 600px; display: block; margin: 0 auto;">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">{{__('words.email.contact.admin_name')}} </span>{{$data['name']}}</p>
                            <p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">{{__('words.email.contact.admin_email')}} </span>{{$data['email']}}</p>
                            <p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">{{__('words.email.contact.admin_msg')}} </span>{{$data['message']}}</p>
                        </td>
                    </tr>
                </table>

                <br>
            </div>
        </td>
        <td></td>
    </tr>
</table>

</body>

</html>