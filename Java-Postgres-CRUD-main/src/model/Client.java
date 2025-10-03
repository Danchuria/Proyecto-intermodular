package model;

public class Client extends User {
    private String IBAN;

    public Client() {
        super();
        this.setTipoUsuario("CLIENTE");
    }

    public Client(int idUser, int numeroTelefono, String email, String nombre, String IBAN) {
        super(idUser, numeroTelefono, email, nombre, "CLIENTE");
        this.IBAN = IBAN;
    }

    public String getIBAN() {
        return IBAN;
    }

    public void setIBAN(String IBAN) {
        this.IBAN = IBAN;
    }

    @Override
    public String toString() {
        return "Client{" +
                "idUser=" + getIdUser() +
                ", nombre='" + getNombre() + '\'' +
                ", email='" + getEmail() + '\'' +
                ", telefono=" + getNumeroTelefono() +
                ", IBAN='" + IBAN + '\'' +
                '}';
    }
}
