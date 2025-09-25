<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LTI Launch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="progress position-absolute top-50 start-50 translate-middle" role="progressbar" aria-label="Loading&hellip;" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script>
        const platformOIDCLoginURL = '<?= $redirect ?>';
        const url = new URL(platformOIDCLoginURL);
        const platformOrigin = url.origin;
        const state = url.searchParams.get('state');
        const messageId = crypto.randomUUID();

        function redirect_to_platform(url) {
            window.location.href = url;
        }

        document.hasStorageAccess().then(hasAccess => {
            if (!hasAccess) {
                const frameName = '<?= $lti_storage_target ?>';
                const parent = window.parent || window.opener;
                const targetFrame = frameName === "_parent" ? parent : parent.frames[frameName];

                window.addEventListener('message', function(event) {
                    if (
                        typeof event.data !== "object" ||
                        event.data.subject !== "lti.put_data.response" ||
                        event.data.message_id !== messageId ||
                        event.origin !== platformOrigin) {
                        return;
                    }

                    if (event.data.error) {
                        console.error(`Error ${event.data.error.code} ${event.data.error.message}`)
                        return;
                    }

                    redirect_to_platform(platformOIDCLoginURL);
                });

                targetFrame.postMessage({
                    "subject": "lti.put_data",
                    "message_id": messageId,
                    "key": `state_${state}`,
                    "value": state
                }, platformOrigin)
            } else {
                redirect_to_platform(platformOIDCLoginURL);
            }
        })
    </script>
</body>

</html>