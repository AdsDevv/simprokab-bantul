import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                // Set font 'sans' jadi Plus Jakarta, 'serif' jadi Playfair
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                serif: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                // PALET WARNA BARU (Lebih Mewah)
                coklat: {
                    gelap: "#1F1512", // Hitam kecoklatan (untuk teks utama)
                    tua: "#4A3728", // Coklat kulit (untuk navbar/tombol utama)
                    sedang: "#9C7C58", // Coklat emas/perunggu (untuk aksen)
                    muda: "#E8E1D9", // Abu-abu hangat (untuk border/garis)
                    krem: "#F9F7F2", // Putih gading (untuk background website)
                    gold: "#D4AF37", // Emas murni (untuk highlight spesial)
                },
            },
        },
    },
    plugins: [],
};
