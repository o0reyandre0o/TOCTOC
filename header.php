<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Instrument Serif', 'serif'],
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            border: "hsl(var(--border))",
            input: "hsl(var(--input))",
            ring: "hsl(var(--ring))",
            background: "hsl(var(--background))",
            foreground: "hsl(var(--foreground))",
            primary: {
              DEFAULT: "hsl(var(--primary))",
              foreground: "hsl(var(--primary-foreground))",
            },
            secondary: {
              DEFAULT: "hsl(var(--secondary))",
              foreground: "hsl(var(--secondary-foreground))",
            },
            accent: {
              DEFAULT: "hsl(var(--accent))",
              foreground: "hsl(var(--accent-foreground))",
            },
            muted: {
              DEFAULT: "hsl(var(--muted))",
              foreground: "hsl(var(--muted-foreground))",
            },
            card: {
              DEFAULT: "hsl(var(--card))",
              foreground: "hsl(var(--card-foreground))",
            },
            sky: {
              deep: "hsl(var(--sky-deep))",
              mid: "hsl(var(--sky-mid))",
              light: "hsl(var(--sky-light))",
              pale: "hsl(var(--sky-pale))",
            },
          },
          borderRadius: {
            lg: "var(--radius)",
            md: "calc(var(--radius) - 2px)",
            sm: "calc(var(--radius) - 4px)",
          },
          boxShadow: {
            soft: "0 10px 40px -10px hsl(212 80% 30% / 0.18)",
            glass: "0 20px 60px -20px hsl(212 80% 25% / 0.25)",
            pill: "0 8px 24px -8px hsl(220 45% 10% / 0.35)",
            glow: "0 0 60px hsl(72 100% 62% / 0.45)",
          },
          animation: {
            'float-slow': 'float-slow 9s ease-in-out infinite',
            'drift': 'drift 30s ease-in-out infinite alternate',
          },
          keyframes: {
            'float-slow': {
              '0%, 100%': { transform: 'translateY(0px) translateX(0px)' },
              '50%': { transform: 'translateY(-20px) translateX(10px)' },
            },
            'drift': {
              '0%': { transform: 'translateX(-5%)' },
              '100%': { transform: 'translateX(5%)' },
            }
          }
        }
      }
    }
    </script>
    <style type="text/tailwindcss">
      @layer base {
        :root {
          --background: 210 60% 98%;
          --foreground: 220 40% 10%;
          --card: 0 0% 100%;
          --card-foreground: 220 40% 10%;
          --popover: 0 0% 100%;
          --popover-foreground: 220 40% 10%;
          --primary: 220 45% 8%;
          --primary-foreground: 0 0% 100%;
          --secondary: 210 40% 96%;
          --secondary-foreground: 220 40% 10%;
          --muted: 210 30% 94%;
          --muted-foreground: 220 15% 40%;
          --accent: 72 100% 62%;
          --accent-foreground: 220 45% 8%;
          --sky-deep: 212 95% 45%;
          --sky-mid: 205 95% 60%;
          --sky-light: 200 100% 88%;
          --sky-pale: 205 100% 96%;
          --destructive: 0 84% 60%;
          --destructive-foreground: 0 0% 100%;
          --border: 215 25% 88%;
          --input: 215 25% 88%;
          --ring: 212 95% 45%;
          --radius: 1.25rem;
        }
        .dark {
          --background: 222.2 84% 4.9%;
          --foreground: 210 40% 98%;
        }
        body {
          @apply bg-background text-foreground antialiased font-sans;
        }
        h1, h2, h3, h4 {
          @apply font-display tracking-tight font-normal;
        }
      }
      @layer utilities {
        .glass {
          background: hsl(0 0% 100% / 0.55);
          backdrop-filter: blur(20px) saturate(160%);
          border: 1px solid hsl(0 0% 100% / 0.6);
        }
        .glass-dark {
          background: hsl(220 45% 8% / 0.6);
          backdrop-filter: blur(20px) saturate(160%);
          border: 1px solid hsl(0 0% 100% / 0.08);
        }
      }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="fixed top-6 left-1/2 -translate-x-1/2 w-[90%] max-w-6xl h-16 glass rounded-full flex items-center justify-between px-8 z-[1000] shadow-soft border border-white/50">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 group text-primary decoration-none">
        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-primary-foreground font-display font-extrabold text-sm">T</div>
        <span class="text-lg font-display tracking-tight">TocToc <em class="italic text-sky-deep">Marketing</em></span>
    </a>
    <div class="hidden items-center gap-8 md:flex">
        <a href="#home" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors decoration-none">Home</a>
        <a href="#loop" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors decoration-none">Loop</a>
        <a href="#process" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors decoration-none">Process</a>
        <a href="#portfolio" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors decoration-none">Portfolio</a>
    </div>
    <a href="#contact" class="bg-accent text-accent-foreground h-11 px-6 rounded-full flex items-center gap-2 font-bold text-sm shadow-glow transition-transform hover:scale-105 decoration-none">
        Book a Call
        <div class="w-6 h-6 rounded-full bg-primary text-primary-foreground flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
        </div>
    </a>
</nav>
