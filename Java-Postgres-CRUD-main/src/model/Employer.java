package model;

import java.util.Date;

public class Employer extends User {
    private Date fechaContrato;
    private String departamento;
    private double salario;
    private String rango;
    private double descuento;
    private String IBAN;

    public Employer() {
        super();
        this.setTipoUsuario("EMPLOYER");
    }

    public Employer(int idUser, int numeroTelefono, String email, String nombre,
                    Date fechaContrato, String departamento, double salario,
                    String rango, double descuento, String IBAN) {
        super(idUser, numeroTelefono, email, nombre, "EMPLOYER");
        this.fechaContrato = fechaContrato;
        this.departamento = departamento;
        this.salario = salario;
        this.rango = rango;
        this.descuento = descuento;
        this.IBAN = IBAN;
    }

    public Date getFechaContrato() {
        return fechaContrato;
    }

    public void setFechaContrato(Date fechaContrato) {
        this.fechaContrato = fechaContrato;
    }

    public String getDepartamento() {
        return departamento;
    }

    public void setDepartamento(String departamento) {
        this.departamento = departamento;
    }

    public double getSalario() {
        return salario;
    }

    public void setSalario(double salario) {
        this.salario = salario;
    }

    public String getRango() {
        return rango;
    }

    public void setRango(String rango) {
        this.rango = rango;
    }

    public double getDescuento() {
        return descuento;
    }

    public void setDescuento(double descuento) {
        this.descuento = descuento;
    }

    public String getIBAN() {
        return IBAN;
    }

    public void setIBAN(String IBAN) {
        this.IBAN = IBAN;
    }

    @Override
    public String toString() {
        return "Employer{" +
                "idUser=" + getIdUser() +
                ", nombre='" + getNombre() + '\'' +
                ", email='" + getEmail() + '\'' +
                ", telefono=" + getNumeroTelefono() +
                ", fechaContrato=" + fechaContrato +
                ", departamento='" + departamento + '\'' +
                ", salario=" + salario +
                ", rango='" + rango + '\'' +
                ", descuento=" + descuento +
                ", IBAN='" + IBAN + '\'' +
                '}';
    }
}
 