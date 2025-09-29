package conection;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conection {
	// Par�metros de conexi�n
	private static final String URL = "jdbc:postgresql://localhost:5432/ProductosDB";
	private static final String USER = "postgres";
	private static final String PASSWORD = "postgres";

	// M�todo para establecer la conexi�n
	public static Connection obtenerConexion() {
		Connection conexion = null;
		try {
			// Registrar el controlador JDBC
			Class.forName("org.postgresql.Driver");
			// Establecer la conexi�n
			conexion = DriverManager.getConnection(URL, USER, PASSWORD);
			System.out.println("Conexi�n exitosa a la base de datos");
		} catch (ClassNotFoundException e) {
			System.out.println("Error al cargar el controlador JDBC: " + e.getMessage());
		} catch (SQLException e) {
			System.out.println("Error al establecer la conexi�n: " + e.getMessage());
		}
		return conexion;
	}

} // FINAL CLASS