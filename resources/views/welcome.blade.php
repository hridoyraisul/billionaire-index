<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billionare Index</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        img:hover {
            z-index: 9999999;
            transform: scale(1.5);
            transition: all 0.3s ease-in-out;
            margin-left: 5px;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-6xl w-full mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Billionaire Index</h1>
            <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="min-w-full bg-white dark:bg-gray-800">
                    @foreach ($users ?? [] as $user)
                        <tr id="tr-{{ $user['email'] }}" data-bal="{{ $user['available_balance'] }}"
                            class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-1 px-6 text-[20px] text-gray-900 dark:text-gray-200">
                                <img class="w-12 h-12 rounded-full inline-block mr-2" src="{{ $user['avatar'] }}"
                                    alt="{{ $user['name'] }}">
                                {{ $user['name'] }}
                            </td>
                            <td class="py-1 px-6 text-[20px] text-left text-gray-900 dark:text-gray-200">
                                {{ $user['company'] }}
                            </td>
                            <td class="py-1 px-6 text-[20px] text-center text-gray-900 dark:text-gray-200">
                                {{ $user['state'] }}
                            </td>
                            <td id="{{ $user['email'] }}"
                                class="py-1 px-6 text-[30px] text-right text-teal-900 dark:text-teal-200">
                                💵 $ {{ $user['balance'] }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        function sortTable() {
            const table = document.querySelector('table');
            const rows = Array.from(table.querySelectorAll('tbody tr'));

            rows.sort((a, b) => {
                const aBal = parseFloat(a.getAttribute('data-bal'));
                const bBal = parseFloat(b.getAttribute('data-bal'));
                return bBal - aBal;
            });

            const tbody = table.querySelector('tbody');
            rows.forEach(row => tbody.appendChild(row));
        }

        const eventSource = new EventSource('/users');

        eventSource.onmessage = function(event) {
            //            console.log('Data received:', event.data);
            const data = JSON.parse(event.data);
            document.getElementById(data.email).innerText = `💵 $ ${data.balance}`;
            document.getElementById(`tr-${data.email}`).setAttribute('data-bal', data.balance);
            document.getElementById(data.email).classList.add('animate-pulse bg-teal-100 dark:bg-teal-800 text-teal-900 dark:text-teal-200');
            setTimeout(() => {
                document.getElementById(data.email).classList.remove('animate-pulse bg-teal-100 dark:bg-teal-800 text-teal-900 dark:text-teal-200');
            }, 1000);
            sortTable();
        };

        eventSource.onerror = function() {
            console.error('connection error.');
            eventSource.close();
        };

        window.addEventListener('beforeunload', function() {
            eventSource.close();
        });
    </script>



</body>

</html>
