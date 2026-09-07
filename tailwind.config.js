/**
 * Tailwind config for the TOCTOC Sky Editorial theme.
 * Ported 1:1 from the inline `tailwind.config` that used to feed the CDN
 * build in header.php. Compile with: npm run build:css
 */
module.exports = {
  // Scan every theme template at the root AND everything under inc/.
  //
  // inc/ was missing until 2026-09-07 and it cost a broken layout: the /team/
  // profile pages render from inc/team-member-render.php, so every class used
  // only there — lg:col-span-2, sm:justify-between — was silently dropped from
  // the build. Tailwind does not warn about this; the class simply does not
  // exist and the element falls back to its default box.
  //
  // `scratch/` (scraped HTML copies) and node_modules stay excluded.
  content: ['./*.php', './inc/**/*.php'],
  theme: {
    extend: {
      fontFamily: {
        display: ['Instrument Serif', 'serif'],
        sans: ['Inter', 'sans-serif'],
      },
      colors: {
        border: 'hsl(var(--border))',
        input: 'hsl(var(--input))',
        ring: 'hsl(var(--ring))',
        background: 'hsl(var(--background))',
        foreground: 'hsl(var(--foreground))',
        primary: {
          DEFAULT: 'hsl(var(--primary))',
          foreground: 'hsl(var(--primary-foreground))',
        },
        secondary: {
          DEFAULT: 'hsl(var(--secondary))',
          foreground: 'hsl(var(--secondary-foreground))',
        },
        accent: {
          DEFAULT: 'hsl(var(--accent))',
          foreground: 'hsl(var(--accent-foreground))',
        },
        muted: {
          DEFAULT: 'hsl(var(--muted))',
          foreground: 'hsl(var(--muted-foreground))',
        },
        card: {
          DEFAULT: 'hsl(var(--card))',
          foreground: 'hsl(var(--card-foreground))',
        },
        sky: {
          deep: 'hsl(var(--sky-deep))',
          mid: 'hsl(var(--sky-mid))',
          light: 'hsl(var(--sky-light))',
          pale: 'hsl(var(--sky-pale))',
        },
      },
      borderRadius: {
        lg: 'var(--radius)',
        md: 'calc(var(--radius) - 2px)',
        sm: 'calc(var(--radius) - 4px)',
      },
      boxShadow: {
        soft: '0 10px 40px -10px hsl(212 80% 30% / 0.18)',
        glass: '0 20px 60px -20px hsl(212 80% 25% / 0.25)',
        pill: '0 8px 24px -8px hsl(220 45% 10% / 0.35)',
        glow: '0 0 60px hsl(72 100% 62% / 0.45)',
      },
      animation: {
        'float-slow': 'float-slow 9s ease-in-out infinite',
        drift: 'drift 30s ease-in-out infinite alternate',
      },
      keyframes: {
        'float-slow': {
          '0%, 100%': { transform: 'translateY(0px) translateX(0px)' },
          '50%': { transform: 'translateY(-20px) translateX(10px)' },
        },
        drift: {
          '0%': { transform: 'translateX(-5%)' },
          '100%': { transform: 'translateX(5%)' },
        },
      },
    },
  },
  plugins: [],
};
