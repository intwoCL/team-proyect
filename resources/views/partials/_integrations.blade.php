<script type='text/javascript' data-cfasync='false'>

window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '9aa40980-a367-4eaf-9c09-d1b66ccaff57', f: true }); done = true; } }; })();

window.purechatApi.on('chatbox:ready', function () {
     purechatApi.set('visitor.name', '{{ current_user()->present()->getFullName() }}'); // Sets the visitor name to "Joe Doe"
     purechatApi.set('visitor.firstName', '{{ current_user()->first_name }}'); // Sets the visitor first name to "Joe"
     purechatApi.set('visitor.lastName', '{{ current_user()->last_name }}'); // Sets the visitor last name to "Doe"
     purechatApi.set('visitor.email', '{{ current_user()->email }}'); // Sets the visitor's email address to "joe@joesmarket.com"
    //  purechatApi.set('visitor.phoneNumber', '6025551234'); // Sets the visitor's phone number "6025551234"
    //  purechatApi.set('visitor.company', 'Pure Chat'); // Sets the visitor's company "Pure Chat"
     // Sets the visitor's question to "I need some help with an order I have already made"
    //  purechatApi.set('visitor.question', 'I need some help with an order I have already made'); 
});

</script>