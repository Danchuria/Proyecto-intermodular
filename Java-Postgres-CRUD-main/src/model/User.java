package model;

public class User {
    private int idUser;
    private int numeroTelefono;
    private String email;
    private String nombre;
    private String tipoUsuario; // "CLIENTE" o "EMPLOYER"

    // Constructor vacío
    public User() {
    }

    // Constructor con parámetros
    public User(int idUser, int numeroTelefono, String email, String nombre, String tipoUsuario) {
        this.idUser = idUser;
        this.numeroTelefono = numeroTelefono;
        this.email = email;
        this.nombre = nombre;
        this.tipoUsuario = tipoUsuario;
    }

    // Getters y Setters
    public int getIdUser() {
        return idUser;
    }

    public void setIdUser(int idUser) {
        this.idUser = idUser;
    }

    public int getNumeroTelefono() {
        return numeroTelefono;
    }

    public void setNumeroTelefono(int numeroTelefono) {
        this.numeroTelefono = numeroTelefono;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getTipoUsuario() {
        return tipoUsuario;
    }

    public void setTipoUsuario(String tipoUsuario) {
        this.tipoUsuario = tipoUsuario;
    }

    @Override
    public String toString() {
        return "User{" +
                "idUser=" + idUser +
                ", numeroTelefono=" + numeroTelefono +
                ", email='" + email + '\'' +
                ", nombre='" + nombre + '\'' +
                ", tipoUsuario='" + tipoUsuario + '\'' +
                '}';
    }
}
