import type { Metadata } from "next";
import "../styles/globals.scss";


export const metadata: Metadata = {
  title: "Minecraft server list",
  description: "Generated by create next app",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body>
        {children}
      </body>
    </html>
  );
}
