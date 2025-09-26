<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LTI Launch</title>
    <style>
        @keyframes spinner-border {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .spinner-border {
            position: absolute;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
            height: 15vw;
            width: 15vw;
            display: inline-block;
            vertical-align: -0.125em;
            border-radius: 50%;
            border: 0.25em solid hsla(0, 0%, 50%, 0.75);
            border-right-color: transparent;
            animation: 0.75s linear infinite spinner-border;
        }
    </style>
</head>

<body>
    <div class="spinner-border"></div>
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