<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="styles.css" rel="stylesheet" />
  <style>
    body {
      cursor: url("cursor1.png"), auto;
    }

    #text {
      width: 12ch;
      animation:
        typing 2s steps(12),
        blink 0.5s step-end infinite alternate;
      white-space: nowrap;
      overflow: hidden;
      border-right: 3px solid;
    }

    @keyframes typing {
      from {
        width: 0;
      }
    }

    @keyframes blink {
      50% {
        border-color: transparent;
      }
    }
  </style>
</head>

<body>
  <section class="flex flex-col min-h-screen bg-slate-800 text-white bg-center bg-cover bg-blend-overlay bg-fixed bg-black/30" style="background-image: url(&quot;bg1.png&quot;)">
    <div class="flex items-center h-20">
      <div class="mx-auto relative px-5 max-w-screen-xl w-full flex items-center justify-end">
        <div class="text-6xl uppercase font-title absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 flex flex-row mt-[30px]" id="text">
          <svg class="h-16 w-16 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
            <circle cx="12" cy="10" r="3" />
          </svg>
          TRACKER-007
        </div>
      </div>
    </div>

    <div class="flex-1 flex items-center">
      <div class="text-center mx-auto">
        <h1 class="text-6xl animate-fade_up">Welcome to TRACKER-007!</h1>
        <p class="font-light text-3xl mt-5 animate-fade_up">
          Track your vehicle anywhere, anytime..
        </p>
        <a class="px-5 py-2 inline-block bg-cyan-500 text-white hover:bg-cyan-400 mt-10 animate-fade_in rounded-lg border-[3px] transition-colors delay-100 duration-200 ease-in-out hover:-translate-y-1 hover:scale-110 border-hex-border" href="2.php">Track Now</a>
      </div>
    </div>
  </section>
</body>

</html>