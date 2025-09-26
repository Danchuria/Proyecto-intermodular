package conection;

import java.sql.Connection;  // Import necesario

public class PruebaConeccion {
    public static void main(String[] args) {
        try {
            // Usar el método static correctamente
            Connection conexion = Conection.obtenerConexion();
            
            if (conexion != null) {
                System.out.println("✅ Conexión exitosa a la base de datos.");
                conexion.close();
            } else {
                System.out.println("❌ No se pudo establecer la conexión.");
            }
        } catch (Exception e) {
            System.out.println("❌ Error: " + e.getMessage());
        }
    }
}