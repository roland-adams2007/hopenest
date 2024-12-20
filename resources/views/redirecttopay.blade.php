<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
</head>
<body>
    <form id="redirectForm" action="{{ url('/pay') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script type="text/javascript">
        document.getElementById('redirectForm').submit();
    </script>
</body>
</html>
