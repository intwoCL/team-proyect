<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
  var _smartsupp = _smartsupp || {};
  _smartsupp.key = 'f08de9b6485af59741ef5944f5a7d177476e0709';
  _smartsupp.hideMobileWidget = true;
  // _smartsupp.offsetY = 00;
  window.smartsupp||(function(d) {
    var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
    s=d.getElementsByTagName('script')[0];c=d.createElement('script');
    c.type='text/javascript';c.charset='utf-8';c.async=true;
    c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
  })(document);



</script>
@if (auth('user')->check())
<script>

  const data = [
    "{{ current_user()->present()->getFullName() }}",
    "{{ current_user()->email }}"
  ];
  smartsupp('chat:close');

  smartsupp('name', data[0]);
  smartsupp('email', data[1]);
</script> 
@endif