<div style="padding-left:35px;padding-right:35px;margin-left:2em;margin-right:2em;">
    <h1 style="color:#1b4b72">{{__("World Money Transfer")}}</h1>
    <span style="display:inline-block;background-color:#1b4b72;color:white; font-size:1.4em">{{__($codetext ." : ". $code)}}</span>
    <div style="font-size: 1.5em; color:#474646; line-height:normal">
        <p>{{__($title . ' '. $sender['last_name'] .',')}}</p>
        <p>{{__($content)}}</p>
        <p>{{__($content1)}}</p>
        <p>{{__($content2)}}</p>
        <a href="http://track-transaction.worldlypayments.com/">{{__($textlink)}}</a>
    </div>
    <h2 style="color:#1b4b72">{{__($summary)}}</h2>
    <table style="font-size:1.5em;text-align: left">
        <thead>
        <tr style="border-bottom:1px solid #1b4b72;">
            <th style="width:350px;">{{__($recipientinfo)}}</th>
            <th style="width:350px;">{{__($senderinfo)}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <span>{{__('First name : ' . $recipient['first_name'])}}</span><br/>
                <span>{{__('Last name : ' .$recipient['last_name'])}}</span><br/>
                <span>{{__('Phone number : '. $recipient['phone_number'])}}</span><br/>
                <span>{{__('Email : ' .$recipient['email'])}}</span><br/>
                <span>{{__('Country : ' .$recipient['country'])}}</span><br/>
            </td>
            <td>
                <span>{{__('First name : ' . $sender['first_name'])}}</span><br/>
                <span>{{__('Last name : ' .$sender['last_name'])}}</span><br/>
                <span>{{__('Phone number : '. $sender['phone_number'])}}</span><br/>
                <span>{{__('Email : ' .$sender['email'])}}</span><br/>
                <span>{{__('Country : ' .$sender['country'])}}</span><br/>
            </td>
        </tr>
        </tbody>
    </table>
    <p><span style="font-size: 1.5em">{{__('Amount : '. $amount . ' ' .$currency)}}</span></p>
    <p><span style="font-size: 1.5em">{{__('Status : '. $status)}}</span></p>
</div>
