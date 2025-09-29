package conection;

public class PruebaSinBD {
    public static void main(String[] args) {
        System.out.println("🔹 Probando solo el driver JDBC...");

        try {
            Class.forName("org.postgresql.Driver");
            System.out.println("✅ Driver PostgreSQL cargado correctamente");
            System.out.println("❌ Pero no hay conexión a la BD (PostgreSQL no está ejecutándose)");
        } catch (ClassNotFoundException e) {
            System.out.println("❌ Error cargando driver: " + e.getMessage());
        }

        System.out.println("🔹 Fin de la prueba");
    }
}
