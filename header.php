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
        }
      }
    }
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="fixed top-0 left-0 right-0 z-[100] border-b border-border/40 bg-background/60 backdrop-blur-xl transition-all duration-300">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 group">
            <div class="relative flex h-9 w-9 items-center justify-center rounded-xl bg-primary text-primary-foreground shadow-soft transition-transform group-hover:scale-105">
                <span class="text-xl font-display leading-none mt-1">T</span>
            </div>
            <span class="text-lg font-display tracking-tight text-primary">TocToc <em class="italic text-sky-deep">Marketing</em></span>
        </a>
        <div class="hidden items-center gap-8 md:flex">
            <a href="#home" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors">Home</a>
            <a href="#about" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors">About</a>
            <a href="#loop" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors">Revenue Loop</a>
            <a href="#portfolio" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors">Portfolio</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="#contact" class="hidden rounded-full bg-accent px-5 py-2 text-xs font-bold text-accent-foreground shadow-glow transition-transform hover:scale-105 sm:inline-block">
                Get Started
            </a>
            <button class="md:hidden text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></button>
            </button>
        </div>
    </div>
</nav>
